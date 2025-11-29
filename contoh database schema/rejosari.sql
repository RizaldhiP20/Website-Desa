/*
 Navicat Premium Dump SQL

 Source Server         : postgresql
 Source Server Type    : PostgreSQL
 Source Server Version : 170006 (170006)
 Source Host           : localhost:5432
 Source Catalog        : Rejosari_Lamongan
 Source Schema         : rejosari

 Target Server Type    : PostgreSQL
 Target Server Version : 170006 (170006)
 File Encoding         : 65001

 Date: 23/11/2025 18:53:30
*/


-- ----------------------------
-- Sequence structure for desa_profiles_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "rejosari"."desa_profiles_id_seq";
CREATE SEQUENCE "rejosari"."desa_profiles_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for dusuns_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "rejosari"."dusuns_id_seq";
CREATE SEQUENCE "rejosari"."dusuns_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for jobs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "rejosari"."jobs_id_seq";
CREATE SEQUENCE "rejosari"."jobs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for kartu_keluarga_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "rejosari"."kartu_keluarga_id_seq";
CREATE SEQUENCE "rejosari"."kartu_keluarga_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for kegiatan_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "rejosari"."kegiatan_id_seq";
CREATE SEQUENCE "rejosari"."kegiatan_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for penduduk_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "rejosari"."penduduk_id_seq";
CREATE SEQUENCE "rejosari"."penduduk_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for peristiwa_kelahiran_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "rejosari"."peristiwa_kelahiran_id_seq";
CREATE SEQUENCE "rejosari"."peristiwa_kelahiran_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for peristiwa_kematian_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "rejosari"."peristiwa_kematian_id_seq";
CREATE SEQUENCE "rejosari"."peristiwa_kematian_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for peristiwa_mutasi_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "rejosari"."peristiwa_mutasi_id_seq";
CREATE SEQUENCE "rejosari"."peristiwa_mutasi_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for rumahs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "rejosari"."rumahs_id_seq";
CREATE SEQUENCE "rejosari"."rumahs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for surat_jenis_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "rejosari"."surat_jenis_id_seq";
CREATE SEQUENCE "rejosari"."surat_jenis_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for surat_permohonans_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "rejosari"."surat_permohonans_id_seq";
CREATE SEQUENCE "rejosari"."surat_permohonans_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for cache
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."cache";
CREATE TABLE "rejosari"."cache" (
  "key" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "value" text COLLATE "pg_catalog"."default" NOT NULL,
  "expiration" int4 NOT NULL
)
;

-- ----------------------------
-- Records of cache
-- ----------------------------

-- ----------------------------
-- Table structure for desa_profiles
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."desa_profiles";
CREATE TABLE "rejosari"."desa_profiles" (
  "id" int8 NOT NULL DEFAULT nextval('"rejosari".desa_profiles_id_seq'::regclass),
  "nama_desa" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "kecamatan" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "kabupaten" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "provinsi" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "kepala_desa" varchar(255) COLLATE "pg_catalog"."default",
  "sekretaris_desa" varchar(255) COLLATE "pg_catalog"."default",
  "alamat" varchar(255) COLLATE "pg_catalog"."default",
  "sejarah_desa" text COLLATE "pg_catalog"."default",
  "visi_misi" text COLLATE "pg_catalog"."default",
  "foto_kepala_desa" varchar(255) COLLATE "pg_catalog"."default",
  "foto_desa" varchar(255) COLLATE "pg_catalog"."default",
  "jumlah_dusun" int4 NOT NULL DEFAULT 0,
  "jumlah_kk" int4 NOT NULL DEFAULT 0,
  "jumlah_jiwa" int4 NOT NULL DEFAULT 0,
  "jumlah_laki_laki" int4 NOT NULL DEFAULT 0,
  "jumlah_perempuan" int4 NOT NULL DEFAULT 0,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of desa_profiles
-- ----------------------------
INSERT INTO "rejosari"."desa_profiles" VALUES (1, 'Rejosari', 'Deket', 'Lamongan', 'Jawa Timur', 'Bapak Kepala Desa', NULL, 'Jl. Poros Desa Rejosari', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL);
INSERT INTO "rejosari"."desa_profiles" VALUES (2, 'Rejosari', 'Deket', 'Lamongan', 'Jawa Timur', 'Bapak Kades', NULL, 'Jl. Poros Desa', NULL, NULL, NULL, NULL, 0, 0, 0, 0, 0, NULL, NULL);

-- ----------------------------
-- Table structure for dusuns
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."dusuns";
CREATE TABLE "rejosari"."dusuns" (
  "id" int8 NOT NULL DEFAULT nextval('"rejosari".dusuns_id_seq'::regclass),
  "nama_dusun" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "kepala_dusun" varchar(255) COLLATE "pg_catalog"."default",
  "jumlah_asoma" int4 NOT NULL DEFAULT 0,
  "jumlah_kk" int4 NOT NULL DEFAULT 0,
  "jumlah_jiwa" int4 NOT NULL DEFAULT 0,
  "jumlah_laki_laki" int4 NOT NULL DEFAULT 0,
  "jumlah_perempuan" int4 NOT NULL DEFAULT 0,
  "deskripsi" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of dusuns
-- ----------------------------
INSERT INTO "rejosari"."dusuns" VALUES (1, 'Dusun Gajah', 'Kasun Gajah', 0, 0, 0, 0, 0, NULL, NULL, NULL);
INSERT INTO "rejosari"."dusuns" VALUES (2, 'Dusun Gapuk', 'Kasun Gapuk', 0, 0, 0, 0, 0, NULL, NULL, NULL);

-- ----------------------------
-- Table structure for jobs
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."jobs";
CREATE TABLE "rejosari"."jobs" (
  "id" int8 NOT NULL DEFAULT nextval('"rejosari".jobs_id_seq'::regclass),
  "queue" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "payload" text COLLATE "pg_catalog"."default" NOT NULL,
  "attempts" int2 NOT NULL,
  "reserved_at" int4,
  "available_at" int4 NOT NULL,
  "created_at" int4 NOT NULL
)
;

-- ----------------------------
-- Records of jobs
-- ----------------------------

-- ----------------------------
-- Table structure for kartu_keluarga
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."kartu_keluarga";
CREATE TABLE "rejosari"."kartu_keluarga" (
  "id" int8 NOT NULL DEFAULT nextval('"rejosari".kartu_keluarga_id_seq'::regclass),
  "nomor_kk" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "rumah_id" int8 NOT NULL,
  "kepala_keluarga_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of kartu_keluarga
-- ----------------------------
INSERT INTO "rejosari"."kartu_keluarga" VALUES (1, '3524010000000001', 1, 1, NULL, NULL);
INSERT INTO "rejosari"."kartu_keluarga" VALUES (2, '3524010000000002', 2, 3, NULL, NULL);

-- ----------------------------
-- Table structure for kegiatan
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."kegiatan";
CREATE TABLE "rejosari"."kegiatan" (
  "id" int8 NOT NULL DEFAULT nextval('"rejosari".kegiatan_id_seq'::regclass),
  "judul" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "deskripsi" text COLLATE "pg_catalog"."default" NOT NULL,
  "kategori" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tanggal_kegiatan" date NOT NULL,
  "foto" varchar(255) COLLATE "pg_catalog"."default",
  "slug" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "status" varchar(255) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 'published'::character varying,
  "dibuat_oleh" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of kegiatan
-- ----------------------------

-- ----------------------------
-- Table structure for penduduk
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."penduduk";
CREATE TABLE "rejosari"."penduduk" (
  "id" int8 NOT NULL DEFAULT nextval('"rejosari".penduduk_id_seq'::regclass),
  "dusun_id" int8,
  "kartu_keluarga_id" int8,
  "nama_lengkap" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "nik" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "jenis_kelamin" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tempat_lahir" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tanggal_lahir" date NOT NULL,
  "agama" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "pekerjaan" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "pendidikan_terakhir" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "status_dalam_kk" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "status_perkawinan" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "status_penduduk" varchar(50) COLLATE "pg_catalog"."default" DEFAULT 'Hidup'::character varying,
  "role_id" int8,
  "nomor_telepon" varchar(20) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of penduduk
-- ----------------------------
INSERT INTO "rejosari"."penduduk" VALUES (1, 1, NULL, 'Budi Santoso (Admin)', '3524010101800001', 'Laki-laki', 'Lamongan', '1980-01-01', 'Islam', 'Perangkat Desa', 'S1', 'KEPALA KELUARGA', 'KAWIN', NULL, NULL, 'Hidup', NULL, '081234567890');
INSERT INTO "rejosari"."penduduk" VALUES (2, 1, NULL, 'Siti Aminah (Operator)', '3524010202900001', 'Perempuan', 'Lamongan', '1990-02-02', 'Islam', 'Bidan', 'D3', 'ISTRI', 'KAWIN', NULL, NULL, 'Hidup', NULL, '081234567891');
INSERT INTO "rejosari"."penduduk" VALUES (3, 2, 2, 'Ahmad Dahlan (Warga)', '3524010303950001', 'Laki-laki', 'Surabaya', '1995-03-03', 'Islam', 'Wiraswasta', 'SMA', 'KEPALA KELUARGA', 'KAWIN', NULL, NULL, 'Hidup', NULL, '081234567892');

-- ----------------------------
-- Table structure for peristiwa_kelahiran
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."peristiwa_kelahiran";
CREATE TABLE "rejosari"."peristiwa_kelahiran" (
  "id" int8 NOT NULL DEFAULT nextval('"rejosari".peristiwa_kelahiran_id_seq'::regclass),
  "penduduk_id" int8 NOT NULL,
  "nama_bayi" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "jenis_kelamin" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tanggal_lahir" date NOT NULL,
  "tempat_lahir" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "jam_lahir" time(0),
  "ibu_id" int8,
  "ayah_id" int8,
  "nomor_akte_kelahiran" varchar(255) COLLATE "pg_catalog"."default",
  "catatan" text COLLATE "pg_catalog"."default",
  "status" varchar(255) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 'tercatat'::character varying,
  "tanggal_pencatatan" timestamp(0),
  "petugas_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of peristiwa_kelahiran
-- ----------------------------

-- ----------------------------
-- Table structure for peristiwa_kematian
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."peristiwa_kematian";
CREATE TABLE "rejosari"."peristiwa_kematian" (
  "id" int8 NOT NULL DEFAULT nextval('"rejosari".peristiwa_kematian_id_seq'::regclass),
  "penduduk_id" int8 NOT NULL,
  "tanggal_kematian" date NOT NULL,
  "jam_kematian" time(0),
  "tempat_kematian" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "penyebab_kematian" varchar(255) COLLATE "pg_catalog"."default",
  "nomor_akte_kematian" varchar(255) COLLATE "pg_catalog"."default",
  "pelapor" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "hubungan_pelapor" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "catatan" text COLLATE "pg_catalog"."default",
  "status" varchar(255) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 'tercatat'::character varying,
  "tanggal_pencatatan" timestamp(0),
  "petugas_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of peristiwa_kematian
-- ----------------------------

-- ----------------------------
-- Table structure for peristiwa_mutasi
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."peristiwa_mutasi";
CREATE TABLE "rejosari"."peristiwa_mutasi" (
  "id" int8 NOT NULL DEFAULT nextval('"rejosari".peristiwa_mutasi_id_seq'::regclass),
  "penduduk_id" int8 NOT NULL,
  "jenis_mutasi" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "tanggal_mutasi" date NOT NULL,
  "asal_dusun" varchar(255) COLLATE "pg_catalog"."default",
  "asal_desa" varchar(255) COLLATE "pg_catalog"."default",
  "asal_kecamatan" varchar(255) COLLATE "pg_catalog"."default",
  "asal_kabupaten" varchar(255) COLLATE "pg_catalog"."default",
  "dusun_tujuan_id" int8,
  "alasan_mutasi" varchar(255) COLLATE "pg_catalog"."default",
  "nomor_surat_keterangan" varchar(255) COLLATE "pg_catalog"."default",
  "catatan" text COLLATE "pg_catalog"."default",
  "status" varchar(255) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 'tercatat'::character varying,
  "tanggal_pencatatan" timestamp(0),
  "petugas_id" int8,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of peristiwa_mutasi
-- ----------------------------

-- ----------------------------
-- Table structure for rumahs
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."rumahs";
CREATE TABLE "rejosari"."rumahs" (
  "id" int8 NOT NULL DEFAULT nextval('"rejosari".rumahs_id_seq'::regclass),
  "alamat_rumah" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "dusun_id" int8 NOT NULL,
  "rt" int4 NOT NULL,
  "rw" int4 NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of rumahs
-- ----------------------------
INSERT INTO "rejosari"."rumahs" VALUES (1, 'Jl. Gajah Mada No. 1', 1, 1, 1, NULL, NULL);
INSERT INTO "rejosari"."rumahs" VALUES (2, 'Jl. Gapuk Raya No. 5', 2, 1, 1, NULL, NULL);
INSERT INTO "rejosari"."rumahs" VALUES (3, 'Jl. Merdeka No. 10', 1, 2, 1, NULL, NULL);

-- ----------------------------
-- Table structure for surat_jenis
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."surat_jenis";
CREATE TABLE "rejosari"."surat_jenis" (
  "id" int8 NOT NULL DEFAULT nextval('"rejosari".surat_jenis_id_seq'::regclass),
  "kode_surat" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "nama_surat" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of surat_jenis
-- ----------------------------
INSERT INTO "rejosari"."surat_jenis" VALUES (1, 'SKU', 'Surat Keterangan Usaha', '2025-11-23 13:40:20', NULL);
INSERT INTO "rejosari"."surat_jenis" VALUES (2, 'SKD', 'Surat Keterangan Domisili', '2025-11-23 13:40:20', NULL);
INSERT INTO "rejosari"."surat_jenis" VALUES (3, 'SPN', 'Surat Pengantar Nikah', '2025-11-23 13:40:20', NULL);
INSERT INTO "rejosari"."surat_jenis" VALUES (4, 'SKTM', 'Surat Keterangan Tidak Mampu', '2025-11-23 13:40:20', NULL);
INSERT INTO "rejosari"."surat_jenis" VALUES (5, 'SKCK', 'Pengantar SKCK', '2025-11-23 13:40:20', NULL);
INSERT INTO "rejosari"."surat_jenis" VALUES (6, 'KTP', 'Permohonan KTP Baru', '2025-11-23 13:40:20', NULL);

-- ----------------------------
-- Table structure for surat_permohonans
-- ----------------------------
DROP TABLE IF EXISTS "rejosari"."surat_permohonans";
CREATE TABLE "rejosari"."surat_permohonans" (
  "id" int8 NOT NULL DEFAULT nextval('"rejosari".surat_permohonans_id_seq'::regclass),
  "penduduk_id" int8 NOT NULL,
  "surat_jenis_id" int8 NOT NULL,
  "nomor_permohonan" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "status" varchar(255) COLLATE "pg_catalog"."default" NOT NULL DEFAULT 'diajukan'::character varying,
  "keterangan_permohonan" text COLLATE "pg_catalog"."default",
  "alasan_penolakan" text COLLATE "pg_catalog"."default",
  "file_pendukung" varchar(255) COLLATE "pg_catalog"."default",
  "tanggal_permohonan" timestamp(0) NOT NULL DEFAULT CURRENT_TIMESTAMP,
  "tanggal_diproses" timestamp(0),
  "tanggal_selesai" timestamp(0),
  "petugas_id" int8,
  "catatan_internal" text COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0)
)
;

-- ----------------------------
-- Records of surat_permohonans
-- ----------------------------

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "rejosari"."desa_profiles_id_seq"
OWNED BY "rejosari"."desa_profiles"."id";
SELECT setval('"rejosari"."desa_profiles_id_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "rejosari"."dusuns_id_seq"
OWNED BY "rejosari"."dusuns"."id";
SELECT setval('"rejosari"."dusuns_id_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "rejosari"."jobs_id_seq"
OWNED BY "rejosari"."jobs"."id";
SELECT setval('"rejosari"."jobs_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "rejosari"."kartu_keluarga_id_seq"
OWNED BY "rejosari"."kartu_keluarga"."id";
SELECT setval('"rejosari"."kartu_keluarga_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "rejosari"."kegiatan_id_seq"
OWNED BY "rejosari"."kegiatan"."id";
SELECT setval('"rejosari"."kegiatan_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "rejosari"."penduduk_id_seq"
OWNED BY "rejosari"."penduduk"."id";
SELECT setval('"rejosari"."penduduk_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "rejosari"."peristiwa_kelahiran_id_seq"
OWNED BY "rejosari"."peristiwa_kelahiran"."id";
SELECT setval('"rejosari"."peristiwa_kelahiran_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "rejosari"."peristiwa_kematian_id_seq"
OWNED BY "rejosari"."peristiwa_kematian"."id";
SELECT setval('"rejosari"."peristiwa_kematian_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "rejosari"."peristiwa_mutasi_id_seq"
OWNED BY "rejosari"."peristiwa_mutasi"."id";
SELECT setval('"rejosari"."peristiwa_mutasi_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "rejosari"."rumahs_id_seq"
OWNED BY "rejosari"."rumahs"."id";
SELECT setval('"rejosari"."rumahs_id_seq"', 1, false);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "rejosari"."surat_jenis_id_seq"
OWNED BY "rejosari"."surat_jenis"."id";
SELECT setval('"rejosari"."surat_jenis_id_seq"', 6, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "rejosari"."surat_permohonans_id_seq"
OWNED BY "rejosari"."surat_permohonans"."id";
SELECT setval('"rejosari"."surat_permohonans_id_seq"', 1, false);

-- ----------------------------
-- Primary Key structure for table cache
-- ----------------------------
ALTER TABLE "rejosari"."cache" ADD CONSTRAINT "cache_pkey" PRIMARY KEY ("key");

-- ----------------------------
-- Primary Key structure for table desa_profiles
-- ----------------------------
ALTER TABLE "rejosari"."desa_profiles" ADD CONSTRAINT "desa_profiles_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table dusuns
-- ----------------------------
ALTER TABLE "rejosari"."dusuns" ADD CONSTRAINT "dusuns_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table jobs
-- ----------------------------
CREATE INDEX "jobs_queue_index" ON "rejosari"."jobs" USING btree (
  "queue" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table jobs
-- ----------------------------
ALTER TABLE "rejosari"."jobs" ADD CONSTRAINT "jobs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table kartu_keluarga
-- ----------------------------
ALTER TABLE "rejosari"."kartu_keluarga" ADD CONSTRAINT "kartu_keluarga_nomor_kk_unique" UNIQUE ("nomor_kk");

-- ----------------------------
-- Primary Key structure for table kartu_keluarga
-- ----------------------------
ALTER TABLE "rejosari"."kartu_keluarga" ADD CONSTRAINT "kartu_keluarga_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table kegiatan
-- ----------------------------
ALTER TABLE "rejosari"."kegiatan" ADD CONSTRAINT "kegiatan_slug_unique" UNIQUE ("slug");

-- ----------------------------
-- Checks structure for table kegiatan
-- ----------------------------
ALTER TABLE "rejosari"."kegiatan" ADD CONSTRAINT "kegiatan_kategori_check" CHECK (kategori::text = ANY (ARRAY['pembangunan'::character varying, 'pemerintahan'::character varying, 'pembinaan'::character varying, 'pemasyarakatan'::character varying, 'lainnya'::character varying]::text[]));
ALTER TABLE "rejosari"."kegiatan" ADD CONSTRAINT "kegiatan_status_check" CHECK (status::text = ANY (ARRAY['draft'::character varying, 'published'::character varying, 'archived'::character varying]::text[]));

-- ----------------------------
-- Primary Key structure for table kegiatan
-- ----------------------------
ALTER TABLE "rejosari"."kegiatan" ADD CONSTRAINT "kegiatan_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table penduduk
-- ----------------------------
CREATE INDEX "penduduk_status_penduduk_index" ON "rejosari"."penduduk" USING btree (
  "status_penduduk" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Uniques structure for table penduduk
-- ----------------------------
ALTER TABLE "rejosari"."penduduk" ADD CONSTRAINT "penduduk_nik_unique" UNIQUE ("nik");

-- ----------------------------
-- Primary Key structure for table penduduk
-- ----------------------------
ALTER TABLE "rejosari"."penduduk" ADD CONSTRAINT "penduduk_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table peristiwa_kelahiran
-- ----------------------------
ALTER TABLE "rejosari"."peristiwa_kelahiran" ADD CONSTRAINT "peristiwa_kelahiran_nomor_akte_kelahiran_unique" UNIQUE ("nomor_akte_kelahiran");

-- ----------------------------
-- Primary Key structure for table peristiwa_kelahiran
-- ----------------------------
ALTER TABLE "rejosari"."peristiwa_kelahiran" ADD CONSTRAINT "peristiwa_kelahiran_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table peristiwa_kematian
-- ----------------------------
ALTER TABLE "rejosari"."peristiwa_kematian" ADD CONSTRAINT "peristiwa_kematian_nomor_akte_kematian_unique" UNIQUE ("nomor_akte_kematian");

-- ----------------------------
-- Primary Key structure for table peristiwa_kematian
-- ----------------------------
ALTER TABLE "rejosari"."peristiwa_kematian" ADD CONSTRAINT "peristiwa_kematian_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table peristiwa_mutasi
-- ----------------------------
ALTER TABLE "rejosari"."peristiwa_mutasi" ADD CONSTRAINT "peristiwa_mutasi_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table rumahs
-- ----------------------------
ALTER TABLE "rejosari"."rumahs" ADD CONSTRAINT "rumahs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table surat_jenis
-- ----------------------------
ALTER TABLE "rejosari"."surat_jenis" ADD CONSTRAINT "surat_jenis_kode_surat_unique" UNIQUE ("kode_surat");

-- ----------------------------
-- Primary Key structure for table surat_jenis
-- ----------------------------
ALTER TABLE "rejosari"."surat_jenis" ADD CONSTRAINT "surat_jenis_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table surat_permohonans
-- ----------------------------
ALTER TABLE "rejosari"."surat_permohonans" ADD CONSTRAINT "surat_permohonans_nomor_permohonan_unique" UNIQUE ("nomor_permohonan");

-- ----------------------------
-- Primary Key structure for table surat_permohonans
-- ----------------------------
ALTER TABLE "rejosari"."surat_permohonans" ADD CONSTRAINT "surat_permohonans_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table kartu_keluarga
-- ----------------------------
ALTER TABLE "rejosari"."kartu_keluarga" ADD CONSTRAINT "kartu_keluarga_kepala_keluarga_id_foreign" FOREIGN KEY ("kepala_keluarga_id") REFERENCES "rejosari"."penduduk" ("id") ON DELETE SET NULL ON UPDATE NO ACTION;
ALTER TABLE "rejosari"."kartu_keluarga" ADD CONSTRAINT "kartu_keluarga_rumah_id_foreign" FOREIGN KEY ("rumah_id") REFERENCES "rejosari"."rumahs" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table penduduk
-- ----------------------------
ALTER TABLE "rejosari"."penduduk" ADD CONSTRAINT "penduduk_kartu_keluarga_id_foreign" FOREIGN KEY ("kartu_keluarga_id") REFERENCES "rejosari"."kartu_keluarga" ("id") ON DELETE SET NULL ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table peristiwa_kelahiran
-- ----------------------------
ALTER TABLE "rejosari"."peristiwa_kelahiran" ADD CONSTRAINT "peristiwa_kelahiran_ayah_id_foreign" FOREIGN KEY ("ayah_id") REFERENCES "rejosari"."penduduk" ("id") ON DELETE SET NULL ON UPDATE NO ACTION;
ALTER TABLE "rejosari"."peristiwa_kelahiran" ADD CONSTRAINT "peristiwa_kelahiran_ibu_id_foreign" FOREIGN KEY ("ibu_id") REFERENCES "rejosari"."penduduk" ("id") ON DELETE SET NULL ON UPDATE NO ACTION;
ALTER TABLE "rejosari"."peristiwa_kelahiran" ADD CONSTRAINT "peristiwa_kelahiran_penduduk_id_foreign" FOREIGN KEY ("penduduk_id") REFERENCES "rejosari"."penduduk" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table peristiwa_kematian
-- ----------------------------
ALTER TABLE "rejosari"."peristiwa_kematian" ADD CONSTRAINT "peristiwa_kematian_penduduk_id_foreign" FOREIGN KEY ("penduduk_id") REFERENCES "rejosari"."penduduk" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table peristiwa_mutasi
-- ----------------------------
ALTER TABLE "rejosari"."peristiwa_mutasi" ADD CONSTRAINT "peristiwa_mutasi_dusun_tujuan_id_foreign" FOREIGN KEY ("dusun_tujuan_id") REFERENCES "rejosari"."dusuns" ("id") ON DELETE SET NULL ON UPDATE NO ACTION;
ALTER TABLE "rejosari"."peristiwa_mutasi" ADD CONSTRAINT "peristiwa_mutasi_penduduk_id_foreign" FOREIGN KEY ("penduduk_id") REFERENCES "rejosari"."penduduk" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table rumahs
-- ----------------------------
ALTER TABLE "rejosari"."rumahs" ADD CONSTRAINT "rumahs_dusun_id_foreign" FOREIGN KEY ("dusun_id") REFERENCES "rejosari"."dusuns" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;

-- ----------------------------
-- Foreign Keys structure for table surat_permohonans
-- ----------------------------
ALTER TABLE "rejosari"."surat_permohonans" ADD CONSTRAINT "surat_permohonans_penduduk_id_foreign" FOREIGN KEY ("penduduk_id") REFERENCES "rejosari"."penduduk" ("id") ON DELETE CASCADE ON UPDATE NO ACTION;
ALTER TABLE "rejosari"."surat_permohonans" ADD CONSTRAINT "surat_permohonans_surat_jenis_id_foreign" FOREIGN KEY ("surat_jenis_id") REFERENCES "rejosari"."surat_jenis" ("id") ON DELETE RESTRICT ON UPDATE NO ACTION;
