$(document).ready(function () {
    $('#menu').metisMenu();
    $('.start-barrating').barrating({
        theme: 'fontawesome-stars',
    });
    $('.profile-header').find('.icon-edit').on('mouseover', function() {
        $(this).tooltip();
    });
    $('.profile-header').find('.icon-edit').on('click', function() {
        $('.profile').hide();
        $('.update-profile').show();
    });
    $('.alert').delay(3000).slideUp();
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
});
