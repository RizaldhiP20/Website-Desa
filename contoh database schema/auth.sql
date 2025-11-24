/*
 Navicat Premium Dump SQL

 Source Server         : postgresql
 Source Server Type    : PostgreSQL
 Source Server Version : 170006 (170006)
 Source Host           : localhost:5432
 Source Catalog        : Rejosari_Lamongan
 Source Schema         : auth

 Target Server Type    : PostgreSQL
 Target Server Version : 170006 (170006)
 File Encoding         : 65001

 Date: 23/11/2025 18:53:23
*/


-- ----------------------------
-- Sequence structure for ip_blocks_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "auth"."ip_blocks_id_seq";
CREATE SEQUENCE "auth"."ip_blocks_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for jwt_blacklist_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "auth"."jwt_blacklist_id_seq";
CREATE SEQUENCE "auth"."jwt_blacklist_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for login_logs_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "auth"."login_logs_id_seq";
CREATE SEQUENCE "auth"."login_logs_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for migrations_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "auth"."migrations_id_seq";
CREATE SEQUENCE "auth"."migrations_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for roles_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "auth"."roles_id_seq";
CREATE SEQUENCE "auth"."roles_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for users_id_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "auth"."users_id_seq";
CREATE SEQUENCE "auth"."users_id_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 9223372036854775807
START 1
CACHE 1;

-- ----------------------------
-- Table structure for ip_blocks
-- ----------------------------
DROP TABLE IF EXISTS "auth"."ip_blocks";
CREATE TABLE "auth"."ip_blocks" (
  "id" int8 NOT NULL DEFAULT nextval('"auth".ip_blocks_id_seq'::regclass),
  "ip_address" varchar(45) COLLATE "pg_catalog"."default" NOT NULL,
  "reason" text COLLATE "pg_catalog"."default",
  "blocked_at" timestamp(0) DEFAULT now(),
  "unblock_at" timestamp(0)
)
;

-- ----------------------------
-- Records of ip_blocks
-- ----------------------------
INSERT INTO "auth"."ip_blocks" VALUES (1, '10.10.10.100', 'Terdeteksi 5x percobaan login gagal dalam 1 menit', '2025-11-18 19:01:30', '2025-11-18 20:01:30');

-- ----------------------------
-- Table structure for jwt_blacklist
-- ----------------------------
DROP TABLE IF EXISTS "auth"."jwt_blacklist";
CREATE TABLE "auth"."jwt_blacklist" (
  "id" int8 NOT NULL DEFAULT nextval('"auth".jwt_blacklist_id_seq'::regclass),
  "token_hash" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "user_id" int8 NOT NULL,
  "expires_at" timestamp(0) NOT NULL,
  "created_at" timestamp(0) DEFAULT now()
)
;

-- ----------------------------
-- Records of jwt_blacklist
-- ----------------------------

-- ----------------------------
-- Table structure for login_logs
-- ----------------------------
DROP TABLE IF EXISTS "auth"."login_logs";
CREATE TABLE "auth"."login_logs" (
  "id" int8 NOT NULL DEFAULT nextval('"auth".login_logs_id_seq'::regclass),
  "ip_address" varchar(45) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "is_success" bool NOT NULL DEFAULT false,
  "user_agent" text COLLATE "pg_catalog"."default",
  "login_at" timestamp(0) DEFAULT now()
)
;

-- ----------------------------
-- Records of login_logs
-- ----------------------------
INSERT INTO "auth"."login_logs" VALUES (1, '192.168.1.50', 'admin@rejosari.desa.id', 'f', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120.0.0.0', '2025-11-18 19:01:30');
INSERT INTO "auth"."login_logs" VALUES (2, '192.168.1.50', 'admin@rejosari.desa.id', 't', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) Chrome/120.0.0.0', '2025-11-18 19:01:30');

-- ----------------------------
-- Table structure for migrations
-- ----------------------------
DROP TABLE IF EXISTS "auth"."migrations";
CREATE TABLE "auth"."migrations" (
  "id" int4 NOT NULL DEFAULT nextval('"auth".migrations_id_seq'::regclass),
  "migration" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "batch" int4 NOT NULL
)
;

-- ----------------------------
-- Records of migrations
-- ----------------------------
INSERT INTO "auth"."migrations" VALUES (1, '0001_01_01_000000_create_users_table', 1);
INSERT INTO "auth"."migrations" VALUES (2, '0001_01_01_000001_create_cache_table', 1);
INSERT INTO "auth"."migrations" VALUES (3, '0001_01_01_000002_create_jobs_table', 1);
INSERT INTO "auth"."migrations" VALUES (4, '2025_01_01_000000_create_rejosari_schema', 1);
INSERT INTO "auth"."migrations" VALUES (5, '2025_11_13_105031_create_desa_profiles_table', 1);
INSERT INTO "auth"."migrations" VALUES (6, '2025_11_13_105034_create_kegiatan_table', 1);
INSERT INTO "auth"."migrations" VALUES (7, '2025_11_13_105035_create_penduduk_table', 1);
INSERT INTO "auth"."migrations" VALUES (8, '2025_11_13_105036_create_dusun_table', 1);
INSERT INTO "auth"."migrations" VALUES (9, '2025_11_16_070000_create_rumahs_table', 1);
INSERT INTO "auth"."migrations" VALUES (10, '2025_11_16_073515_create_kartu_keluarga_table', 1);
INSERT INTO "auth"."migrations" VALUES (11, '2025_11_16_073516_add_foreign_key_to_penduduk_table', 1);
INSERT INTO "auth"."migrations" VALUES (12, '2025_11_16_073517_add_role_and_penduduk_id_to_users_table', 1);
INSERT INTO "auth"."migrations" VALUES (13, '2025_11_16_073518_create_surat_jenis_table', 1);
INSERT INTO "auth"."migrations" VALUES (14, '2025_11_16_210000_create_auth_schema', 1);
INSERT INTO "auth"."migrations" VALUES (15, '2025_11_17_000001_create_peristiwa_kelahiran_table', 2);
INSERT INTO "auth"."migrations" VALUES (16, '2025_11_17_000002_create_peristiwa_kematian_table', 2);
INSERT INTO "auth"."migrations" VALUES (17, '2025_11_17_000003_create_peristiwa_mutasi_table', 2);
INSERT INTO "auth"."migrations" VALUES (18, '2025_11_17_000004_create_surat_permohonans_table', 2);

-- ----------------------------
-- Table structure for roles
-- ----------------------------
DROP TABLE IF EXISTS "auth"."roles";
CREATE TABLE "auth"."roles" (
  "id" int8 NOT NULL DEFAULT nextval('"auth".roles_id_seq'::regclass),
  "name" varchar(50) COLLATE "pg_catalog"."default" NOT NULL,
  "label" varchar(100) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of roles
-- ----------------------------
INSERT INTO "auth"."roles" VALUES (1, 'admin', 'Administrator Sistem');
INSERT INTO "auth"."roles" VALUES (2, 'operator', 'Operator Pelayanan');
INSERT INTO "auth"."roles" VALUES (3, 'warga', 'Warga Desa');

-- ----------------------------
-- Table structure for sessions
-- ----------------------------
DROP TABLE IF EXISTS "auth"."sessions";
CREATE TABLE "auth"."sessions" (
  "id" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "user_id" int8,
  "ip_address" varchar(45) COLLATE "pg_catalog"."default",
  "user_agent" text COLLATE "pg_catalog"."default",
  "payload" text COLLATE "pg_catalog"."default" NOT NULL,
  "last_activity" int4 NOT NULL
)
;

-- ----------------------------
-- Records of sessions
-- ----------------------------

-- ----------------------------
-- Table structure for users
-- ----------------------------
DROP TABLE IF EXISTS "auth"."users";
CREATE TABLE "auth"."users" (
  "id" int8 NOT NULL DEFAULT nextval('"auth".users_id_seq'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "email_verified_at" timestamp(0),
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "remember_token" varchar(100) COLLATE "pg_catalog"."default",
  "created_at" timestamp(0),
  "updated_at" timestamp(0),
  "penduduk_id" int8,
  "role_id" int8
)
;

-- ----------------------------
-- Records of users
-- ----------------------------
INSERT INTO "auth"."users" VALUES (1, 'Administrator', 'admin@rejosari.desa.id', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 1, 1);
INSERT INTO "auth"."users" VALUES (2, 'Operator Pelayanan', 'pelayanan@rejosari.desa.id', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 2, 2);
INSERT INTO "auth"."users" VALUES (3, 'Ahmad Dahlan', 'ahmad@gmail.com', NULL, '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', NULL, NULL, NULL, 3, 3);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"auth"."ip_blocks_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"auth"."jwt_blacklist_id_seq"', 1, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"auth"."login_logs_id_seq"', 2, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "auth"."migrations_id_seq"
OWNED BY "auth"."migrations"."id";
SELECT setval('"auth"."migrations_id_seq"', 18, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
SELECT setval('"auth"."roles_id_seq"', 3, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "auth"."users_id_seq"
OWNED BY "auth"."users"."id";
SELECT setval('"auth"."users_id_seq"', 1, false);

-- ----------------------------
-- Primary Key structure for table ip_blocks
-- ----------------------------
ALTER TABLE "auth"."ip_blocks" ADD CONSTRAINT "ip_blocks_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table jwt_blacklist
-- ----------------------------
CREATE INDEX "jwt_blacklist_token_hash_index" ON "auth"."jwt_blacklist" USING btree (
  "token_hash" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table jwt_blacklist
-- ----------------------------
ALTER TABLE "auth"."jwt_blacklist" ADD CONSTRAINT "jwt_blacklist_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table login_logs
-- ----------------------------
CREATE INDEX "login_logs_email_index" ON "auth"."login_logs" USING btree (
  "email" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE INDEX "login_logs_ip_address_index" ON "auth"."login_logs" USING btree (
  "ip_address" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table login_logs
-- ----------------------------
ALTER TABLE "auth"."login_logs" ADD CONSTRAINT "login_logs_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table migrations
-- ----------------------------
ALTER TABLE "auth"."migrations" ADD CONSTRAINT "migrations_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Primary Key structure for table roles
-- ----------------------------
ALTER TABLE "auth"."roles" ADD CONSTRAINT "roles_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Indexes structure for table sessions
-- ----------------------------
CREATE INDEX "sessions_last_activity_index" ON "auth"."sessions" USING btree (
  "last_activity" "pg_catalog"."int4_ops" ASC NULLS LAST
);
CREATE INDEX "sessions_user_id_index" ON "auth"."sessions" USING btree (
  "user_id" "pg_catalog"."int8_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table sessions
-- ----------------------------
ALTER TABLE "auth"."sessions" ADD CONSTRAINT "sessions_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Uniques structure for table users
-- ----------------------------
ALTER TABLE "auth"."users" ADD CONSTRAINT "users_email_unique" UNIQUE ("email");

-- ----------------------------
-- Primary Key structure for table users
-- ----------------------------
ALTER TABLE "auth"."users" ADD CONSTRAINT "users_pkey" PRIMARY KEY ("id");

-- ----------------------------
-- Foreign Keys structure for table jwt_blacklist
-- ----------------------------
ALTER TABLE "auth"."jwt_blacklist" ADD CONSTRAINT "jwt_blacklist_user_id_foreign" FOREIGN KEY ("user_id") REFERENCES "auth"."users" ("id") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table users
-- ----------------------------
ALTER TABLE "auth"."users" ADD CONSTRAINT "users_role_id_foreign" FOREIGN KEY ("role_id") REFERENCES "auth"."roles" ("id") ON DELETE RESTRICT ON UPDATE CASCADE;
