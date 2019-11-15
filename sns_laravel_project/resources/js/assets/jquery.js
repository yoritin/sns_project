$(function () {
    
    $('.comment-show').click(function () {
        // クリックした要素から動作させたい要素までを指定
        $(this).parent('.footer-icon')
               .parent('.post-footer')
               .next('.post-footer-comment')
               .toggle('slow');
    });
});
