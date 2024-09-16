<footer class="footer spad" style="position: relative; bottom: 25px; padding: 20px 0; margin-bottom: 0;">
    <div class="container">
      <div class="row footer">
        <div class="col-lg-3 col-md-6 col-sm-6">
          <div class="footer__about">
            <div class="footer__about__logo">
              <a href="/index"><img src="img/logo belindo.png" alt="Logo Belindo"></a>
            </div>
            <h5 style="font-weight: bold; font-size: 20px; margin-top: 10px;">Cari cuan, sambil rebahan!</h5>
            <ul>
              <li>Alamat: Jl. Nginden Semolo 2A Surabaya</li>
              <li>Telp: +0888 1111 858</li>
              <li>Email: admin@belindo.id</li>
            </ul>
          </div>
        </div>
        <div class="col-lg-4 col-md-6 col-sm-6 offset-lg-1">
          <div class="footer__widget adjust-right-margin">
            <div class="row">
              <div class="col adjust-right" style="margin-left: 90px;">
                <h6>Kategori</h6>
                <ul>
                  <li><a href="{{ route('perabot-dapur') }}" @if(Request::is('perabot-dapur')) class="active" @endif>Perabot Dapur</a></li>
                        <li><a href="{{ route('alat-kebersihan') }}" @if(Request::is('alat-kebersihan')) class="active" @endif>Alat Kebersihan</a></li>
                        <li><a href="{{ route('produk-kesehatan') }}" @if(Request::is('produk-kesehatan')) class="active" @endif>Produk Kesehatan</a></li>
                        <li><a href="{{ route('alat-kecantikan') }}" @if(Request::is('alat-kecantikan')) class="active" @endif>Alat Kecantikan</a></li>
                        <li><a href="{{ route('elektronik') }}" @if(Request::is('elektronik')) class="active" @endif>Elektronik</a></li>
                        <li><a href="{{ route('perabot-rumah') }}" @if(Request::is('perabot-rumah')) class="active" @endif>Perabot rumah</a></li>
                        <li><a href="{{ route('ibu-dan-anak') }}" @if(Request::is('ibu-dan-anak')) class="active" @endif>Ibu dan Anak</a></li>
                        <li><a href="{{ route('fashion') }}" @if(Request::is('fashion')) class="active" @endif>Fashion</a></li>
                        <li><a href="{{ route('barang-unik') }}" @if(Request::is('barang-unik')) class="active" @endif>Barang unik</a></li>
                        <li><a href="{{ route('alat-tulis-kantor') }}" @if(Request::is('alat-tulis-kantor')) class="active" @endif>Alat tulis kantor</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
  
        <div class="col-lg-2 col-md-6">
          <div class="footer__widget">
            <h6>Tentang Kami</h6>
            <ul>
              <li><a href="{{ route('about-us') }}">Tentang Kami</a></li>
              <li><a href="{{ route('contact-us') }}">Hubungi Kami</a></li>

            </ul>
          </div>
        </div>
  
        <div class="col-lg-2 col-md-6">
          <div class="footer__widget" style="width: 300px;">
              <h6>Lokasi Gudang</h6>
              <ul>
                  <li style="white-space: nowrap;">Gudang: Jl. Nginden Semolo 2A Surabaya</li>
              </ul>
          </div>
      </div>
      
      
      </div>
      
      <div class="row">
        <div class="col-lg-12">
          <div class="footer__copyright">
            <div class="footer__copyright__text">
              <p>Copyright &copy;<script>document.write(new Date().getFullYear());</script> Belindo</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </footer>
  
  <!-- JS Plugins -->
  <script src="js/jquery-3.3.1.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.nice-select.min.js"></script>
  <script src="js/jquery-ui.min.js"></script>
  <script src="js/jquery.slicknav.js"></script>
  <script src="js/mixitup.min.js"></script>
  <script src="js/owl.carousel.min.js"></script>
  <script src="js/main.js"></script>
  