<div class="fixed-bottom">
    <div class="footer-nav row">
        <button class="footer-nav-item col-4" onclick="location.href='{{ url('/') }}'">
            <div class="footer-nav-icon"><i class="fas fa-home"></i></div>
            <p>ホーム</p>
        </button>
        <button class="footer-nav-item col-4" onclick="location.href='{{ url('/posts/new-info') }}'">
            <div class="footer-nav-icon"><i class="fas fa-rss"></i></div>
            <p>新着投稿</p>
        </button>
        <button class="footer-nav-item col-4" onclick="location.href='{{ url('/users', Auth::id()) }}'">
            <div class="footer-nav-icon"><i class="fas fa-user"></i></div>
            <p>マイページ</p>
        </button>
    </div>
</div>