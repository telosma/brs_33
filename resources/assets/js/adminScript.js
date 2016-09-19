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
