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
        <div class="form-row formDate mb15">
            <div class="deleteDate"><i class="fa fa-trash"></i></div>
            <input type="date" name="time[]" value=""
                class="form-control" placeholder="" autocomplete="off">
        </div>
        `
        return html
    }


    PMD.deleteDate = () => {
        $(document).on('click', '.deleteDate', function () {
            $(this).closest('.form-row').remove();
        })
    }


    $(document).ready(function () {
        PMD.addDate();
        PMD.deleteDate()
    });



})(jQuery);
