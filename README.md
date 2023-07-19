# Api History
Api ini menggunakan codeigniter 3.

# Setup
1. install xampp dan buat project rsms dengan database yang tertera di folder database langsung import
2. git clone dari github https://github.com/chriskacerguis/codeigniter-restserver
3. simpan di local xampp -> htdocs -> rsms
4. panggil di local web browser.

List of the API :

rscm
Make things easier for your teammates with a complete collection description.
POST
Login User
http://localhost/rsms/index.php/auth/login/
Make things easier for your teammates with a complete request description.
Bodyraw (json)
json
{
  "email": "devgandawijaya@gmail.com",
  "password": "it291092.*1234"
}
POST
register User
http://localhost/rsms/index.php/auth/register/
Make things easier for your teammates with a complete request description.
Bodyraw (json)
json
{
  "nama_user": "admin name",
  "status_user": "admin",
  "email": "admin@gmail.com",
  "password": "admin"
}
GET
Get All User
http://localhost/rsms/index.php/pasien/getPasien/
Make things easier for your teammates with a complete request description.
DEL
Delete User
http://localhost/rsms/index.php/auth/delete
Make things easier for your teammates with a complete request description.
Bodyraw (json)
json
{
  "kode_user": "rscm20230719112544"
}
PUT
Update User
http://localhost/rsms/index.php/auth/update
Make things easier for your teammates with a complete request description.
Bodyraw (json)
json
{
  "kode_user": "rscm20230719013347",
  "nama_user": "admin name 1",
  "status_user": "operator",
  "email": "admin1@gmail.com",
  "password": "admin1"
}
GET
Get All Pasien
http://localhost/rsms/index.php/pasien/getPasien/
Make things easier for your teammates with a complete request description.
POST
Add Pasien
http://localhost/rsms/index.php/pasien/addPasien/
Make things easier for your teammates with a complete request description.
Bodyraw (json)
json
{
  "nama_pasien": "testing",
  "alamat_pasien": "testing",
  "nomor_telp": "testing",
  "rtrw": "testing",
  "tanggal_lahir": "2002",
  "jenis_kelamin": "laki-laki",
  "kode_region": "region28109",
  "kode_district": "district03283",
  "kode_subdistrict": "983729",
  "kode_cities": "3029830"
}
PUT
Update Pasien
http://localhost/rsms/index.php/pasien/updatePasien/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "id_pasien": "2023070001",
  "nama_pasien": "testing",
  "alamat_pasien": "testing",
  "nomor_telp": "testing",
  "rtrw": "testing",
  "tanggal_lahir": "2002",
  "jenis_kelamin": "laki-laki",
  "kode_region": "region28109",
  "kode_district": "district03283",
  "kode_subdistrict": "983729",
  "kode_cities": "3029830"
}
DEL
Delete Pasien
http://localhost/rsms/index.php/pasien/deletePasien/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "id_pasien": "2023070001"
}
GET
Get All Region
http://localhost/rsms/index.php/region/getRegions/
Make things easier for your teammates with a complete request description.
POST
Add Region
http://localhost/rsms/index.php/region/addRegion/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "nama_region": "testing region"
}
PUT
Update Region
http://localhost/rsms/index.php/region/updateRegion/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "kode_region": "region20230719051429",
  "nama_region": "testing region update"
}
DEL
Delete Region
http://localhost/rsms/index.php/region/deleteRegion/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "kode_region": "region20230719051429"
}
GET
Get All Cities
http://localhost/rsms/index.php/cities/getCities/
Make things easier for your teammates with a complete request description.
POST
Add Cities
http://localhost/rsms/index.php/cities/addCities/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "nama_cities": "testing region",
  "kode_region": "testing region kode"
}
PUT
update Cities
http://localhost/rsms/index.php/cities/updateCities/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "kode_cities": "region20230719052322",
  "nama_cities": "testing region",
  "kode_region": "testing region kode"
}
DEL
delete Cities
http://localhost/rsms/index.php/cities/deleteCities/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "kode_cities": "region20230719052322"
}
GET
Get All District
http://localhost/rsms/index.php/district/getDistrict/
Make things easier for your teammates with a complete request description.
POST
Add District
http://localhost/rsms/index.php/district/addDistrict/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "nama_district": "testing nama_district",
  "kode_cities": "testing kode_cities kode"
}
PUT
Update District
http://localhost/rsms/index.php/district/updateDistrict/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "kode_district": "district20230719052758",
  "nama_district": "testing nama_district 1",
  "kode_cities": "testing kode_cities kode 1"
}
DEL
delete District
http://localhost/rsms/index.php/district/deleteDistrict/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "kode_district": "district20230719052758"
}
GET
Get All SubDistrict
http://localhost/rsms/index.php/subdistrict/getSubDistrict/
Make things easier for your teammates with a complete request description.
POST
Add SubDistrict
http://localhost/rsms/index.php/subdistrict/addSubDistrict/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "nama_subdistrict": "testing nama_district",
  "kode_district": "testing kode_cities kode"
}
PUT
Update SubDistrict
http://localhost/rsms/index.php/subdistrict/updateSubDistrict/
Make things easier for your teammates with a complete request description.
Request Headers
Content-Type
application/json
Bodyraw (json)
json
{
  "kode_subdistrict": "district20230719053127",
  "nama_subdistrict": "testing nama_district",
  "kode_district": "testing kode_cities kode"
}
DEL
Delete SubDistrict
http://localhost/rsms/index.php/subdistrict/deleteSubDistrict/
Make things easier for your teammates with a complete request description.
Bodyraw (json)
json

