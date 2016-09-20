/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
function message(id, s, m) {
    $(id).removeClass();
    $(id).addClass('alert alert-' + s);
    $(id).html(m);
    $(id).slideDown();
    $(id).delay(3000).slideUp();
}
$(function () {
    $('#side-menu').metisMenu();
});
$(document).ready(function () {
    $('.alert').delay(3000).slideUp();
});
var addNewImage = function (input, img) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $(img).attr('src', e.target.result);
        };
        reader.readAsDataURL(input.files[0]);
    }
};
