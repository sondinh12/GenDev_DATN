document.addEventListener('DOMContentLoaded', function () {
    let productIndex = 0;
    const wrapper = document.getElementById('product-items-wrapper');
    const template = document.getElementById('product-item-template').innerHTML;

    document.getElementById('add-product-btn').addEventListener('click', () => {
        const html = template.replace(/__INDEX__/g, productIndex);
        const div = document.createElement('div');
        div.innerHTML = html;
        wrapper.appendChild(div);
        attachEvents(div, productIndex);
        productIndex++;
    });

    function attachEvents(scope, index) {
        scope.querySelector('.remove-product-btn').addEventListener('click', () => scope.remove());

        // Toggle sản phẩm mới / có sẵn
        scope.querySelectorAll('.product-source-toggle').forEach(radio => {
            radio.addEventListener('change', function () {
                const isNew = this.value === 'new';
                scope.querySelector('.existing-product-section').classList.toggle('d-none', isNew);
                scope.querySelector('.new-product-section').classList.toggle('d-none', !isNew);
            });
        });

        // Toggle loại sản phẩm mới: đơn giản / có biến thể
        const typeSelector = scope.querySelector('.product-type-selector');
        const simpleFields = scope.querySelector('.simple-fields');
        const variantSectionNew = scope.querySelector('.new-product-variant-section');
        if (typeSelector) {
            typeSelector.addEventListener('change', () => {
                if (typeSelector.value === 'variable') {
                    simpleFields?.classList.add('d-none');
                    variantSectionNew?.classList.remove('d-none');
                } else {
                    simpleFields?.classList.remove('d-none');
                    variantSectionNew?.classList.add('d-none');
                }
            });
        }

        // Chọn sản phẩm có sẵn và hiển thị biến thể nếu có
        const existingProductSelector = scope.querySelector('.existing-product-selector');
        const variantWrapper = scope.querySelector('.variant-select-wrapper');
        const variantSelect = scope.querySelector('.variant-select');
        const customVariantSection = scope.querySelector('.existing-product-variant-section');
        const variantModeRadios = scope.querySelectorAll('.variant-mode-radio');
        const priceInput = scope.querySelector('input[name*="[existing_price]"]');
        const quantityInput = scope.querySelector('input[name*="[existing_quantity]"]');

        if (existingProductSelector) {
            existingProductSelector.addEventListener('change', function () {
                const productId = this.value;
                const hasVariant = this.options[this.selectedIndex]?.dataset?.hasVariant === '1';
                variantSelect.innerHTML = '<option value="">-- Chọn biến thể --</option>';
                customVariantSection.classList.add('d-none');
                variantWrapper.classList.add('d-none');

                if (hasVariant && productVariants[productId]) {
                    productVariants[productId].forEach(v => {
                        const opt = document.createElement('option');
                        opt.value = v.id;
                        opt.textContent = v.label;
                        variantSelect.appendChild(opt);
                    });

                    variantWrapper.classList.remove('d-none');
                    // NÚT TẠO BIẾN THỂ
                    // if (!variantWrapper.querySelector('.toggle-create-variant')) {
                    //     const btn = document.createElement('button');
                    //     btn.type = 'button';
                    //     btn.textContent = '➕ Tạo biến thể mới';
                    //     btn.className = 'btn btn-outline-secondary btn-sm mt-2 toggle-create-variant';
                    //     btn.addEventListener('click', () => {
                    //         customVariantSection.classList.remove('d-none');
                    //     });
                    //     variantWrapper.appendChild(btn);
                    // }
                }
            });
        }

        // Toggle chế độ chọn biến thể cũ / tạo biến thể mới
        if (variantModeRadios.length) {
            variantModeRadios.forEach(radio => {
                radio.addEventListener('change', function () {
                    const isNew = this.value === 'new';
                    variantWrapper.classList.toggle('d-none', isNew);
                    customVariantSection.classList.toggle('d-none', !isNew);
                    priceInput.closest('.form-group').classList.toggle('d-none', isNew);
                    quantityInput.closest('.form-group').classList.toggle('d-none', isNew);
                });
            });
        }

        // Shared attribute selection
        scope.querySelectorAll('.attribute-selector').forEach(attrSelector => {
            const container = attrSelector.closest('.existing-product-variant-section') ||
                              attrSelector.closest('.new-product-variant-section');
            const selectedContainer = container.querySelector('.selected-attributes-container');

            attrSelector.addEventListener('change', function () {
                const attrId = this.value;
                const attrName = this.options[this.selectedIndex].dataset.name;
                if (!attrId) return;

                if (selectedContainer.querySelector(`[data-attr-id="${attrId}"]`)) {
                    this.value = '';
                    return;
                }

                const template = document.querySelector(`#attribute-values-template .attribute-group[data-attr-id="${attrId}"]`);
                const clone = template.cloneNode(true);

                clone.querySelectorAll('input[type="checkbox"]').forEach(input => {
                    input.name = `products[${index}][attributes][${attrId}][]`;
                });

                clone.querySelector('.remove-attribute').addEventListener('click', () => clone.remove());
                selectedContainer.appendChild(clone);
                this.value = '';
            });
        });

        // Tạo bảng biến thể
        scope.querySelectorAll('.generate-variants').forEach(generateBtn => {
            const container = generateBtn.closest('.existing-product-variant-section') ||
                              generateBtn.closest('.new-product-variant-section');

            const selectedContainer = container.querySelector('.selected-attributes-container');
            const variantTableContainer = container.querySelector('.variant-table-container');

            generateBtn.addEventListener('click', () => {
                const groups = selectedContainer.querySelectorAll('.attribute-group');
                let selected = [];

                groups.forEach(group => {
                    const values = [...group.querySelectorAll('input[type="checkbox"]:checked')].map(input => ({
                        attrId: group.dataset.attrId,
                        valueId: input.value,
                        valueLabel: input.parentElement.textContent.trim()
                    }));
                    if (values.length) selected.push(values);
                });

                if (!selected.length) {
                    variantTableContainer.innerHTML = '<div class="text-danger">Chưa chọn thuộc tính!</div>';
                    return;
                }

                const combos = cartesian(selected);
                let table = `<table class="table table-bordered mt-2">
                    <thead><tr>
                        <th>Biến thể</th><th>Giá</th><th>Giá Sale</th><th>Số lượng</th><th></th>
                    </tr></thead><tbody>`;

                combos.forEach((combo, i) => {
                    const label = combo.map(c => c.valueLabel).join(' / ');
                    const valueIds = combo.map(c => c.valueId).join(',');

                    table += `<tr>
                        <td>${label}<input type="hidden" name="products[${index}][variants][${i}][value_ids]" value="${valueIds}"></td>
                        <td><input type="number" name="products[${index}][variants][${i}][price]" class="form-control" step="0.01" required></td>
                        <td><input type="number" name="products[${index}][variants][${i}][sale_price]" class="form-control" step="0.01"></td>
                        <td><input type="number" name="products[${index}][variants][${i}][quantity]" class="form-control" required></td>
                        <td><button type="button" class="btn btn-danger btn-sm" onclick="this.closest('tr').remove()">❌</button></td>
                    </tr>`;
                });

                table += '</tbody></table>';
                variantTableContainer.innerHTML = table;
            });
        });
    }

    function cartesian(arr) {
        return arr.reduce((a, b) => a.flatMap(d => b.map(e => [].concat(d, e))), [[]]);
    }
});
