@extends('layouts.app')

@section('title', 'Profil Desa Karumenga')

@section('content')
<div class="container py-5" data-aos="fade-up">
<h2 class="text-center text-danger fw-bold mb-5">Profil Desa Karumenga</h2>

  <!-- Kartu Utama -->
  <div class="row justify-content-center g-4" >
    <div class="col-md-4">
      <div class="card shadow-sm border-0 text-center p-4 hover-card" data-bs-toggle="modal" data-bs-target="#profilModal">
        <h5 class="text-danger fw-bold mb-2">Profil Desa</h5>
        <p class="text-muted mb-0">gambaran umum tentang Desa Karumenga.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0 text-center p-4 hover-card" data-bs-toggle="modal" data-bs-target="#sejarahModal">
        <h5 class="text-danger fw-bold mb-2">Sejarah Desa</h5>
        <p class="text-muted mb-0">Temukan kisah perjalanan Desa Karumenga.</p>
      </div>
    </div>

    <div class="col-md-4">
      <div class="card shadow-sm border-0 text-center p-4 hover-card" data-bs-toggle="modal" data-bs-target="#visiMisiModal">
        <h5 class="text-danger fw-bold mb-2">Visi & Misi</h5>
        <p class="text-muted mb-0">Pelajari arah pembangunan desa ke depan.</p>
      </div>
    </div>
  </div>
</div>

<!-- Modal Profil -->
<div class="modal fade" id="profilModal" tabindex="-1" aria-labelledby="profilModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Profil Desa Karumenga</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="text-justify">
          Desa Karumenga merupakan salah satu desa yang terletak di Kecamatan Langowan Utara, Kabupaten Minahasa, Provinsi Sulawesi Utara. Desa ini berada di kawasan yang dikelilingi oleh perbukitan dan memiliki udara yang sejuk, sehingga mendukung kegiatan pertanian dan pariwisata alam. Letaknya yang strategis membuat Desa Karumenga mudah dijangkau dari berbagai wilayah sekitar, menjadikannya salah satu desa yang potensial untuk dikembangkan dalam berbagai sektor, terutama di bidang pertanian dan pariwisata.
     </p>
        <p>
          Desa Karumenga memiliki potensi alam yang menarik, terutama dengan keberadaan pemandian air panas alami yang berasal dari sumber belerang. Pemandian ini menjadi salah satu daya tarik utama bagi masyarakat sekitar maupun pengunjung dari luar daerah. Selain itu, kondisi wilayah desa didominasi oleh lahan pertanian yang subur, sehingga sebagian besar penduduk menggantungkan hidupnya pada sektor pertanian dan perkebunan. Potensi sumber daya alam yang melimpah ini menjadikan Desa Karumenga memiliki peluang besar untuk dikembangkan menjadi kawasan wisata alam dan agrowisata yang berkelanjutan.
       </p>
       <p>
        Masyarakat Desa Karumenga dikenal memiliki semangat gotong royong dan rasa solidaritas yang tinggi dalam kehidupan sehari-hari. Kegiatan bersama seperti kerja bakti, saling membantu di kebun, maupun kegiatan sosial lainnya menjadi bagian dari budaya masyarakat. Aktivitas penduduk banyak dilakukan di kebun dan di pasar, baik untuk mengolah hasil pertanian maupun menjualnya. Pola hidup yang sederhana namun penuh kebersamaan ini mencerminkan karakter masyarakat desa yang harmonis, produktif, dan menjunjung tinggi nilai kekeluargaan.
       </p>
      </div>
    </div>
  </div>
</div>

<!-- Modal Sejarah -->
<div class="modal fade" id="sejarahModal" tabindex="-1" aria-labelledby="sejarahModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title fw-bold">Sejarah Desa Karumenga</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>

      <div class="modal-body p-4" style="line-height: 1.8;">
        <p class="text-justify mb-3">
          <strong>Nama Desa Karumenga</strong> di dapat dari tumbuhan obat tradisional yang dikenal memiliki khasiat
          untuk menyembuhkan berbagai macam penyakit. Tumbuhan ini terdiri dari dua jenis yaitu <em>Karumenga Merah</em>
          dan <em>Karumenga Putih</em>.
        </p>

        <p class="text-justify mb-3">
          Berdasarkan penuturan para tua-tua desa, wilayah ini dahulu merupakan bagian dari <strong>Desa Waleure</strong>
          Kecamatan Langowan. Awalnya daerah ini hanya merupakan kawasan perkebunan yang terkenal subur dan penghasil
          bahan tambang batu putih yang digunakan untuk pembangunan rumah, gereja, sekolah, serta pekuburan.
        </p>

        <p class="text-justify mb-3">
          Sekitar tahun <strong>1925</strong>, masyarakat yang awalnya hanya berkebun mulai menetap secara permanen.
          Jumlah penduduk yang semakin bertambah mendorong keinginan untuk berdiri sebagai desa mandiri.
          Pada tahun <strong>1942</strong>, masyarakat Karumenga mengusulkan pemisahan dari Desa Waleure dan
          mengangkat <strong>Jorgen H. Pangkey</strong> sebagai Penjabat Hukum Tua pertama.
        </p>

        <p class="text-justify mb-3">
          Setelah melalui musyawarah antara pemerintah dan tokoh-tokoh masyarakat, pada awal tahun <strong>1947</strong>
          diajukan permohonan ke Pemerintah Provinsi. Akhirnya, pada <strong>8 September 1947</strong>,
          <em>Negeri Karumenga</em> diakui sah berdasarkan
          <strong>BESLUIT KANDJ: GOEB: NO. 157 S.P.T.B.</strong> yang ditandatangani oleh
          <em>Residen Manado Dr. H.H. Morison</em>,
          <em>Hoekoem Besar Kawangkoan G.R.A. Wenas</em>, dan
          <em>Hoekoem Kedua Langowan A.R. Warouw</em>.
        </p>

        <hr class="border-danger opacity-50 my-4">

        <h6 class="fw-bold text-danger mb-3">Struktur Pemerintahan Awal Desa Karumenga (1947)</h6>
        <div class="table-responsive">
          <table class="table table-sm table-bordered">
            <tbody>
              <tr><td>Hukum Tua</td><td>Jorgen H. Pangkey</td></tr>
              <tr><td>Juru Tulis Negeri</td><td>Weliam J. Tumilaar</td></tr>
              <tr><td>Pengukur Tanah</td><td>Darius L. Sembel</td></tr>
              <tr><td>Kepala Jaga Polisi</td><td>J. Tumilaar</td></tr>
              <tr><td>Kepala Jaga I</td><td>Oscar A. Sumarandak</td></tr>
              <tr><td>Meweteng I</td><td>D. Longkutoy</td></tr>
              <tr><td>Kepala Jaga II</td><td>Paul Kereh</td></tr>
              <tr><td>Meweteng II</td><td>P. Makarawung</td></tr>
              <tr><td>Kepala Jaga III</td><td>Oscar Pangkey</td></tr>
              <tr><td>Meweteng III</td><td>Paul E. Lumingas</td></tr>
              <tr><td>Manteri Air</td><td>S. Longkutoy</td></tr>
              <tr><td>Kepala Jaga Pelaksana</td><td>H. Tasik</td></tr>
              <tr><td>R.A.A.D.</td><td>N.P. Oroh, L. Sembel, H. Longkutoy</td></tr>
            </tbody>
          </table>
        </div>

        <hr class="border-danger opacity-50 my-4">

        <h6 class="fw-bold text-danger mb-3">Daftar Hukum Tua Desa Karumenga</h6>
        <div class="table-responsive">
          <table class="table table-striped table-bordered align-middle">
            <thead class="table-danger text-center">
              <tr>
                <th style="width: 60px;">No</th>
                <th>Nama Hukum Tua</th>
                <th>Masa Jabatan</th>
              </tr>
            </thead>
            <tbody>
              <tr><td class="text-center">1</td><td>Jorgen H. Pangkey</td><td>1942 - 1950</td></tr>
              <tr><td class="text-center">2</td><td>Gustaf Sumarandak</td><td>1950 - 1958</td></tr>
              <tr><td class="text-center">3</td><td>Weliam Tumilaar</td><td>1958 - 1963</td></tr>
              <tr><td class="text-center">4</td><td>Darius L. Sembel</td><td>1963 - 1981</td></tr>
              <tr><td class="text-center">5</td><td>Johanis Sumilat</td><td>1981 - 1995</td></tr>
              <tr><td class="text-center">6</td><td>Noke Sambuaga</td><td>1995 - 2008</td></tr>
              <tr><td class="text-center">7</td><td>Joudi Roby Sumilat</td><td>2008 - 2014</td></tr>
              <tr><td class="text-center">8</td><td>Joudi Roby Sumilat</td><td>2014 - Sekarang</td></tr>
            </tbody>
          </table>
        </div>

        <p class="text-justify mt-4 mb-0">
          Seiring dengan tingkat perkembangan desa maka Pemerintah Desa dan BPD serta seluruh elemen masyarakat Desa, terus berupaya untuk membangun desa baik melalui bantuan dana-dana stimulan baik dari Pemerintah Pusat maupun Pemerintah Daerah seperti : Alokasi Dana Desa (ADD), Program Nasional Pemberdayaan Masyarakat (PNPM), Program Pembangunan Infrastruktur Perdesaan (PPIP) yang kemudian sejak tahun 2015 mendapatkan dana melalui Alokasi Dana Desa ( ADD ) dan Dana Desa ( DD ), yang kami akui ternyata sangat membantu desa dalam merealisasikan program Pemerintahan, Pembangunan dan Sosial Kemasyarakatan
           </p>
      </div>
    </div>
  </div>
</div>

<!-- Modal Visi Misi -->
<div class="modal fade" id="visiMisiModal" tabindex="-1" aria-labelledby="visiMisiModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content border-0 shadow-lg">
      <div class="modal-header bg-danger text-white">
        <h5 class="modal-title">Visi & Misi Desa Karumenga</h5>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <h6 class="fw-bold text-danger">Visi:</h6>
        <p>“Mewujudkan Desa Karumenga yang maju, mandiri, dan sejahtera melalui pembangunan yang berkelanjutan.”</p>

        <h6 class="fw-bold text-danger mt-4">Misi:</h6>
        <ul>
          <li>Meningkatkan kualitas sumber daya manusia melalui pendidikan dan pelatihan.</li>
          <li>Memperkuat sektor pertanian dan peternakan sebagai basis ekonomi desa.</li>
          <li>Mendorong partisipasi masyarakat dalam pembangunan desa.</li>
          <li>Menjaga nilai budaya, gotong royong, dan lingkungan hidup yang lestari.</li>
        </ul>
      </div>
    </div>
  </div>
</div>

<!-- Struktur Pemerintahan -->
<section id="struktur" class="bg-light py-5 mt-5" data-aos="fade-up">
  <div class="container">
    <h2 class="text-center text-danger mb-5 fw-bold">Struktur Pemerintahan Desa Karumenga</h2>

    <!-- Hukum Tua -->
    <div class="row justify-content-center mb-5">
      <div class="col-md-4">
        <div class="card shadow-sm border-0 text-center p-4">
          <h5 class="fw-bold text-danger mb-2">Hukum Tua</h5>
          <p class="text-muted mb-0">JOUDI ROBY SUMILAT</p>
        </div>
      </div>
    </div>

    <!-- Sekretaris, Kasi, Kaur -->
    <div class="row g-4 justify-content-center mb-5">
      @foreach([
        ['Sekretaris Desa', 'AMANDA I. REWAH, S.E.'],
        ['Kaur Keuangan', 'SILVANA L. LONGKUTOY, S.T.'],
        ['Kaur Umum', 'WINDA Y. SEMBEL, A.Md.'],
        ['Kasie Pemerintahan', 'JEICY J.M. LUMANAUW, S.Kel.'],
        ['Kasie Kesejahteraan', 'RAFLES SEMBEL, S.Pd.'],
        ['Kasie Pelayanan', 'ANDREAS G. SUMILAT']
      ] as $item)
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0 text-center p-3 hover-card">
          <h6 class="fw-bold text-danger">{{ $item[0] }}</h6>
          <p class="text-muted mb-0">{{ $item[1] }}</p>
        </div>
      </div>
      @endforeach
    </div>

    <!-- Kepala Jaga & Meweteng -->
    <div class="row g-4 justify-content-center">
      @foreach([
        ['Kepala Jaga I', 'ERWIN IROTH', 'Meweteng Jaga I', 'DELANO KUMOLONTANG, S.S.'],
        ['Kepala Jaga II', 'ORAL A. LASAPU', 'Meweteng Jaga II', 'STEVEN S. KARUNDENG'],
        ['Kepala Jaga III', 'VEKY F. MAKARAWUNG', 'Meweteng Jaga III', 'ALVIAN A. KUMOLONTANG'],
        ['Kepala Jaga IV', 'ENDRICO S. SAJANG, A.Md.Kel.', 'Meweteng Jaga IV', 'AUDY J. SUMOLANG, S.T.']
      ] as $item)
      <div class="col-md-5 col-sm-6">
        <div class="card shadow-sm border-0 rounded-4 text-center p-4 h-100 hover-card">
          <div class="mb-3">
            <h6 class="fw-bold text-danger mb-1">{{ $item[0] }}</h6>
            <p class="text-muted mb-0">{{ $item[1] }}</p>
          </div>
          <hr class="my-2">
          <div>
            <h6 class="fw-bold text-danger mb-1">{{ $item[2] }}</h6>
            <p class="text-muted mb-0">{{ $item[3] }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- BPD -->
<section id="bpd" class="py-5" data-aos="fade-up">
  <div class="container">
    <h2 class="text-center text-danger mb-5 fw-bold">Badan Permusyawaratan Desa</h2>

    <div class="row justify-content-center g-4">
      @foreach([
        ['Ketua', 'Dra. SANDRA KAWENGIAN'],
        ['Wakil Ketua', 'HEROLD D. SAMBUAGA, S.P.'],
        ['Sekretaris', 'LIDYA LONGKUTOY'],
        ['Anggota', 'LEONARDO R. WUNGKANA'],
        ['Anggota', 'DAYNES S. SEMBEL']
      ] as $item)
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0 text-center p-4 hover-card">
          <h6 class="fw-bold text-danger mb-1">{{ $item[0] }}</h6>
          <p class="text-muted mb-0">{{ $item[1] }}</p>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Potensi Desa -->
<section id="potensi" class="bg-light py-5" data-aos="fade-up">
  <div class="container">
    <h2 class="text-center text-danger mb-5 fw-bold">Potensi Desa Karumenga</h2>

    <div class="row g-4 justify-content-center">
      @foreach([
        [
          'icon' => 'bi-flower1',
          'judul' => 'Pertanian',
          'gambar' => 'images/potensi/sawa.jpg',
          'deskripsi' => 'Desa Karumenga memiliki lahan pertanian yang subur dengan hasil utama berupa padi, jagung, dan sayuran. Sistem pertanian modern dan gotong royong menjadi kunci keberhasilan sektor ini.'
        ],
        [
          'judul' => 'Peternakan',
          'gambar' => 'images/potensi/peternakan.jpg',
          'deskripsi' => 'Warga Karumenga juga aktif dalam peternakan sapi, babi, dan ayam. Potensi ini terus dikembangkan dengan program pemberdayaan masyarakat oleh pemerintah desa.'
        ],
        [
          'judul' => 'Pariwisata',
          'gambar' => 'images/potensi/airpanas.jpg',
          'deskripsi' => 'Desa Karumenga memiliki potensi alam yang menarik, terutama dengan keberadaan pemandian air panas alami yang berasal dari sumber belerang. Pemandian ini menjadi salah satu daya tarik utama bagi masyarakat sekitar maupun pengunjung dari luar daerah.'
        ]
      ] as $item)
      <div class="col-md-4 col-sm-6">
        <div class="card shadow-sm border-0 text-center h-100 hover-card bg-white rounded-4 overflow-hidden">
          <!-- Gambar -->
          <img src="{{ asset($item['gambar']) }}" 
               alt="{{ $item['judul'] }}" 
               class="img-fluid w-100" 
               style="height: 200px; object-fit: cover;">

          <!-- Isi -->
          <div class="p-4">
             <h5 class="fw-bold text-danger">{{ $item['judul'] }}</h5>
            <p class="text-muted mt-2">{{ $item['deskripsi'] }}</p>
          </div>
        </div>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Lokasi dan Batas-Batas Desa -->
<section id="lokasi" class="container py-5" data-aos="fade-up">
  <h2 class="text-center mb-5 fw-bold text-danger">Lokasi dan Batas Wilayah Desa Karumenga</h2>

  <div class="row align-items-start g-4">
    <div class="col-lg-5 col-md-6">
      <div class="card shadow-sm border-0 rounded-4 p-4 h-100">
        <h4 class="fw-bold text-danger mb-4">Batas-Batas Wilayah</h4>
        <table class="table table-borderless mb-0">
          <tbody>
            <tr>
              <th class="text-danger" style="width: 40%;">Sebelah Utara</th>
              <td class="text-secondary">Desa Tempang 2</td>
            </tr>
            <tr>
              <th class="text-danger">Sebelah Selatan</th>
              <td class="text-secondary">Desa Waleure</td>
            </tr>
            <tr>
              <th class="text-danger">Sebelah Timur</th>
              <td class="text-secondary">Desa Sumarayar</td>
            </tr>
            <tr>
              <th class="text-danger">Sebelah Barat</th>
              <td class="text-secondary">Desa Toraget dan Desa Walantakan</td>
            </tr>
            <tr>
              <th class="text-danger">Luas Wilayah</th>
              <td class="text-secondary">80 Hektare</td>
            </tr>
            <tr>
              <th class="text-danger">Jumlah Jaga</th>
              <td class="text-secondary">IV Jaga</td>
            </tr>
          </tbody>
        </table>
      </div>
    </div>

    <div class="col-lg-7 col-md-6">
      <div class="ratio ratio-4x3 shadow-sm rounded-4 overflow-hidden">
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1792.0980598461404!2d124.8322113259873!3d1.1687017421561707!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3287471624c62c63%3A0x4a46005e4f981404!2sDesa%20Karumenga%2C%20Langowan%20Utara!5e1!3m2!1sid!2sid!4v1760750499729!5m2!1sid!2sid"
          style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade">
        </iframe>
      </div>
    </div>
  </div>
</section>


<style>
.hover-card {
  cursor: pointer;
  transition: transform 0.2s ease, box-shadow 0.2s ease;
}
.hover-card:hover {
  transform: translateY(-5px);
  box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
}
.text-justify {
  text-align: justify;
}
.modal-content {
  border-radius: 10px;
}

#potensi {
  background-color: #f8f9fa;
}

#potensi .card {
  transition: transform 0.3s ease, box-shadow 0.3s ease;
}

#potensi .card:hover {
  transform: translateY(-6px);
  box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
}

#potensi i {
  transition: transform 0.3s ease;
}

#potensi .card:hover i {
  transform: scale(1.2);
}

</style>
@endsection