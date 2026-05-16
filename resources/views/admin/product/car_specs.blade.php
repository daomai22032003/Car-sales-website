$('#add-spec').click(function () {

    let html = `

    <div class="spec-item">

        <div class="row">

            <div class="col-md-3">

                <label>Nhóm</label>

                <select name="group_name[]"
                        class="form-control">

                    <option value="KÍCH THƯỚC">
                        KÍCH THƯỚC
                    </option>

                    <option value="ĐỘNG CƠ">
                        ĐỘNG CƠ
                    </option>

                    <option value="NGOẠI THẤT">
                        NGOẠI THẤT
                    </option>

                    <option value="NỘI THẤT">
                        NỘI THẤT
                    </option>

                    <option value="AN TOÀN">
                        AN TOÀN
                    </option>

                </select>

            </div>

            <div class="col-md-4">

                <label>Tên thông số</label>

                <input type="text"
                       name="spec_name[]"
                       class="form-control"
                       placeholder="VD: Công suất cực đại">

            </div>

            <div class="col-md-4">

                <label>Giá trị</label>

                <input type="text"
                       name="spec_value[]"
                       class="form-control"
                       placeholder="VD: 110 Hp">

            </div>

            <div class="col-md-1">

                <button type="button"
                        class="btn btn-danger remove-spec">
                    X
                </button>

            </div>

        </div>

    </div>

    `;

    $('#spec-wrapper').append(html);

});

$(document).on('click', '.remove-spec', function () {

    $(this).closest('.spec-item').remove();

});