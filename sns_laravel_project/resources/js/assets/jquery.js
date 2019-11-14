$(function () {
    // .comment-showをクリックしたら　data-idに格納された$post->idを　コンソールに出力する
    $('.comment-show').click(function () {
        const post_id = $('.comment-show').data('id');
        console.log(post_id);
    });

    // コンソールを確認すると一番上の$post->idしか取得できない

    $('.comment-show').click(function () {
        // ここでif文を使用して取得したpost_idとクリックした場所の$post->idを比べて一致したら、以下の処理をする
        $('.post-footer-comment').toggle('slow');
    });
});