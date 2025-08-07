<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Banner;

class BannerRequest extends FormRequest
{

    public function rules()
    {
        $rules = [
            'title'  => 'required|string|max:255',
            'type'   => 'required|in:static,dynamic',
            'status' => 'required|in:unused,using,expired',
        ];

        if ($this->isMethod('post')) {
            // Create
            $rules['image']    = 'required_if:type,static|image|mimes:jpg,jpeg,png,gif';
            $rules['images']   = 'required_if:type,dynamic|array|min:2';
            $rules['images.*'] = 'image|mimes:jpg,jpeg,png,gif';
        }

        if (in_array($this->method(), ['PUT', 'PATCH'])) {
            // Edit
            $rules['image']            = 'nullable|image|mimes:jpg,jpeg,png,gif';
            $rules['replace_images.*'] = 'nullable|image|mimes:jpg,jpeg,png,gif';
            $rules['delete_images']    = 'sometimes|array';
            $rules['new_images.*']     = 'nullable|image|mimes:jpg,jpeg,png,gif';
        }

        return $rules;
    }

    public function withValidator($validator)
    {
        // Chỉ áp dụng khi edit và type = dynamic
        if (in_array($this->method(), ['PUT', 'PATCH']) && $this->input('type') === 'dynamic') {
            $validator->after(function ($validator) {
                /** @var Banner $banner */
                $banner = $this->route('banner'); 
                if (is_string($banner)) {
                    $banner = Banner::find($banner);
                }

                // Ảnh hiện có
                $existing = $banner && $banner->images
                    ? json_decode($banner->images, true)
                    : [];

                // Số ảnh sẽ xóa
                $toDelete = $this->input('delete_images', []);

                // Số ảnh mới upload
                $added = is_array($this->file('new_images'))
                    ? count($this->file('new_images'))
                    : 0;

                $remaining = count($existing) - count($toDelete) + $added;

                if ($remaining < 2) {
                    $validator->errors()->add(
                        'delete_images',
                        'Banner động tối thiểu phải có 2 ảnh sau khi xóa.'
                    );
                }
            });
        }
    }

    public function messages()
    {
        return [
            'title.required'           => 'Tiêu đề không được để trống.',
            'type.required'            => 'Vui lòng chọn loại banner.',
            'type.in'                  => 'Loại banner không hợp lệ.',
            'status.required'          => 'Vui lòng chọn trạng thái.',
            'status.in'                => 'Trạng thái không hợp lệ.',
            'image.required_if'        => 'Ảnh tĩnh bắt buộc khi chọn banner thường.',
            'image.image'              => 'File ảnh tĩnh không đúng định dạng.',
            'image.mimes'              => 'Ảnh tĩnh phải ở định dạng: jpg, jpeg, png, gif.',
            'images.required_if'       => 'Phải upload ít nhất 2 ảnh khi chọn banner động.',
            'images.array'             => 'Ảnh động phải được upload dưới dạng mảng.',
            'images.min'               => 'Phải upload ít nhất 2 ảnh khi chọn banner động.',
            'images.*.image'           => 'File ảnh động không đúng định dạng.',
            'images.*.mimes'           => 'Ảnh động phải ở định dạng: jpg, jpeg, png, gif.',
            'replace_images.*.image'   => 'Ảnh thay thế không đúng định dạng.',
            'replace_images.*.mimes'   => 'Ảnh thay thế phải ở định dạng: jpg, jpeg, png, gif.',
            'new_images.*.image'       => 'Ảnh mới không đúng định dạng.',
            'new_images.*.mimes'       => 'Ảnh mới phải ở định dạng: jpg, jpeg, png, gif.',
        ];
    }
}
