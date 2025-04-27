@extends('layouts.main')

@section('content')

<div class="container-xxl flex-grow-1 container-p-y">
    <div class="card mb-4">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h5 class="mb-0">Tambah Pasien</h5>
        </div>
        <div class="card-body">
          <form action="{{ route('patients.store') }}" method="POST">
            @csrf
            <div class="row">
              
              <!-- Kiri -->
              <div class="col-md-6">
                <!-- Provinsi -->
                <div class="mb-3">
                  <label for="province_id" class="form-label">Provinsi</label>
                  <select name="province_id" class="form-control" id="province_id" required>
                    <option value="" disabled selected>Pilih Provinsi</option>
                    @foreach ($provinces as $province)
                      <option value="{{ $province->id }}">{{ $province->name }}</option>
                    @endforeach
                  </select>
                </div>
          
                <!-- Kota/Kabupaten -->
                <div class="mb-3">
                  <label for="city_id" class="form-label">Kota/Kabupaten</label>
                  <select name="city_id" class="form-control" id="city_id" required>
                    <option value="" disabled selected>Pilih Kota/Kabupaten</option>
                  </select>
                </div>
          
                <!-- Kecamatan -->
                <div class="mb-3">
                  <label for="district_id" class="form-label">Kecamatan</label>
                  <select name="district_id" class="form-control" id="district_id" required>
                    <option value="" disabled selected>Pilih Kecamatan</option>
                  </select>
                </div>
          
                <!-- Kelurahan -->
                <div class="mb-3">
                  <label for="village_id" class="form-label">Kelurahan</label>
                  <select name="village_id" class="form-control" id="village_id" required>
                    <option value="" disabled selected>Pilih Kelurahan</option>
                  </select>
                </div>
          
                <!-- Pendidikan -->
                <div class="mb-3">
                  <label for="education_id" class="form-label">Pendidikan</label>
                  <select name="education_id" class="form-control" id="education_id" required>
                    <option value="" disabled selected>Pilih Pendidikan</option>
                    @foreach ($educations as $education)
                      <option value="{{ $education->id }}">{{ $education->name }}</option>
                    @endforeach
                  </select>
                </div>
          
                <!-- Pekerjaan -->
                <div class="mb-3">
                  <label for="employment_id" class="form-label">Pekerjaan</label>
                  <select name="employment_id" class="form-control" id="employment_id" required>
                    <option value="" disabled selected>Pilih Pekerjaan</option>
                    @foreach ($employments as $employment)
                      <option value="{{ $employment->id }}">{{ $employment->name }}</option>
                    @endforeach
                  </select>
                </div>
          
                <!-- Nama Pasien -->
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Pasien</label>
                  <input type="text" name="name" class="form-control" id="name" placeholder="Nama Pasien" required />
                </div>
          
                <!-- Alamat -->
                <div class="mb-3">
                  <label for="address" class="form-label">Alamat</label>
                  <textarea name="address" class="form-control" id="address" rows="3" placeholder="Alamat" required></textarea>
                </div>
          
              </div>
          
              <!-- Kanan -->
              <div class="col-md-6">
                <!-- Tempat Lahir -->
                <div class="mb-3">
                  <label for="birth_place" class="form-label">Tempat Lahir</label>
                  <input type="text" name="birth_place" class="form-control" id="birth_place" placeholder="Tempat Lahir" required />
                </div>
          
                <!-- Tanggal Lahir -->
                <div class="mb-3">
                  <label for="birth_date" class="form-label">Tanggal Lahir</label>
                  <input type="date" name="birth_date" class="form-control" id="birth_date" required />
                </div>
          
                <!-- Jenis Kelamin -->
                <div class="mb-3">
                  <label for="gender" class="form-label">Jenis Kelamin</label>
                  <select name="gender" class="form-control" id="gender" required>
                    <option value="" disabled selected>Pilih Jenis Kelamin</option>
                    <option value="male">Laki-laki</option>
                    <option value="female">Perempuan</option>
                  </select>
                </div>
          
                <!-- Phone -->
                <div class="mb-3">
                  <label for="phone" class="form-label">Nomor Telepon</label>
                  <input type="text" name="phone" class="form-control" id="phone" placeholder="Nomor Telepon" />
                </div>
          
                <!-- Marital Status -->
                <div class="mb-3">
                  <label for="marital_status" class="form-label">Status Pernikahan</label>
                  <select name="marital_status" class="form-control" id="marital_status">
                    <option value="" disabled selected>Pilih Status Pernikahan</option>
                    <option value="single">Belum Menikah</option>
                    <option value="married">Menikah</option>
                    <option value="divorced">Cerai</option>
                  </select>
                </div>
          
                <!-- Father Name -->
                <div class="mb-3">
                  <label for="father_name" class="form-label">Nama Ayah</label>
                  <input type="text" name="father_name" class="form-control" id="father_name" placeholder="Nama Ayah" />
                </div>
          
                <!-- Mother Name -->
                <div class="mb-3">
                  <label for="mother_name" class="form-label">Nama Ibu</label>
                  <input type="text" name="mother_name" class="form-control" id="mother_name" placeholder="Nama Ibu" />
                </div>
          
                <!-- Guardian Name -->
                <div class="mb-3">
                  <label for="guardian_name" class="form-label">Nama Wali</label>
                  <input type="text" name="guardian_name" class="form-control" id="guardian_name" placeholder="Nama Wali" />
                </div>
          
                <!-- Identity Number -->
                <div class="mb-3">
                  <label for="identity_number" class="form-label">Nomor Identitas</label>
                  <input type="text" name="identity_number" class="form-control" id="identity_number" placeholder="Nomor KTP/SIM/Paspor" />
                </div>
          
                <!-- Allergy -->
                <div class="mb-3">
                  <label for="allergy" class="form-label">Alergi</label>
                  <textarea name="allergy" class="form-control" id="allergy" rows="2" placeholder="Alergi (Kalau Ada)"></textarea>
                </div>
          
                <!-- Is Employee -->
                <div class="mb-3">
                  <label for="is_employee" class="form-label">Pegawai?</label>
                  <select name="is_employee" class="form-control" id="is_employee">
                    <option value="" disabled selected>Pilih</option>
                    <option value="1">Ya</option>
                    <option value="0">Tidak</option>
                  </select>
                </div>
              </div>
          
            </div>
          
            <div class="row justify-content-end">
              <div class="col-md-12 text-end">
                <button type="submit" class="btn btn-dark mt-3">Kirim</button>
              </div>
            </div>
          </form>
          
        </div>
    </div>
</div>

@endsection

@section('scripts')
<script>
    $('#province_id').on('change', function() {
        var provinceId = $(this).val();
        $('#city_id').empty().append('<option value="" disabled selected>Pilih Kota/Kabupaten</option>');
        $('#district_id').empty().append('<option value="" disabled selected>Pilih Kecamatan</option>');
        $('#village_id').empty().append('<option value="" disabled selected>Pilih Kelurahan</option>');

        if (provinceId) {
            $.get('/getCities/' + provinceId, function(cities) {
                $.each(cities, function(key, city) {
                    $('#city_id').append('<option value="'+ city.id +'">'+ city.name +'</option>');
                });
            });
        }
    });

    $('#city_id').on('change', function() {
        var cityId = $(this).val();
        $('#district_id').empty().append('<option value="" disabled selected>Pilih Kecamatan</option>');
        $('#village_id').empty().append('<option value="" disabled selected>Pilih Kelurahan</option>');

        if (cityId) {
            $.get('/getDistricts/' + cityId, function(districts) {
                $.each(districts, function(key, district) {
                    $('#district_id').append('<option value="'+ district.id +'">'+ district.name +'</option>');
                });
            });
        }
    });

    $('#district_id').on('change', function() {
        var districtId = $(this).val();
        $('#village_id').empty().append('<option value="" disabled selected>Pilih Kelurahan</option>');

        if (districtId) {
            $.get('/getVillages/' + districtId, function(villages) {
                $.each(villages, function(key, village) {
                    $('#village_id').append('<option value="'+ village.id +'">'+ village.name +'</option>');
                });
            });
        }
    });
</script>
@endsection
