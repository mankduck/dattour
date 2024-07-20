(function ($) {
    "use strict";
    var PMD = {};

    PMD.addDate = () => {
        $(document).on('click', '.addDate', function () {
            $('.allDate').append(PMD.renderInputDate());
        })
    }

    PMD.renderInputDate = () => {
        let html = ''
        html += `
        <div class="form-row mb15">
            <input type="date" name="time[]" value=""
                class="form-control" placeholder="" autocomplete="off">
        </div>
        `
        return html
    }


    $(document).ready(function () {
        PMD.addDate();
    });



})(jQuery);
