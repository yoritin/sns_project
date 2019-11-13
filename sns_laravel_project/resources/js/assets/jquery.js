$(function () {
    $('.post-footer-comment').hide();
    $('.comment-show').click(function () {
        $('.post-footer-comment').toggle('slow');
    });
});