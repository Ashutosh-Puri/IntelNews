<!-- Footer Start -->
<footer class="footer">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <script>document.write(new Date().getFullYear())</script> &copy; {{  preg_replace('/(?<!\ )[A-Z]/', ' $0', env('APP_NAME'));  }} by <a target="_blank" href="{{ isset($sitesetting->dev_site)? $sitesetting->dev_site :''; }}">{{ isset($sitesetting->dev_name)? $sitesetting->dev_name :''; }}</a>
            </div>
            <div class="col-md-6">
                <div class="text-md-end footer-links d-none d-sm-block">
                    <a href="javascript:void(0);">About Us</a>
                    <a href="javascript:void(0);">Help</a>
                    <a href="javascript:void(0);">Contact Us</a>
                </div>
            </div>
        </div>
    </div>
</footer>
