-- Bảng phim đã sửa đổi
DROP TABLE IF EXISTS "phim";
CREATE TABLE IF NOT EXISTS "phim"(
                                     "M_id" INTEGER UNSIGNED PRIMARY KEY AUTOINCREMENT NOT NULL,
                                     "tenPhim" varchar,
                                     "thoiLuong" integer,
                                     "trangThai" varchar,
                                     "Poster" varchar,
                                     "Trailer" varchar,
                                     "moTa" varchar,
                                     "imgBanner" varchar,
                                     "created_at" datetime,
                                     "updated_at" datetime
);

-- Bảng lịch chiếu đã sửa đổi
DROP TABLE IF EXISTS "lich_chieu";
CREATE TABLE IF NOT EXISTS "lich_chieu"(
                                           "idLC" varchar not null,
                                           "PC_id" varchar,
                                           "M_id" INTEGER UNSIGNED,
                                           "ngayChieu" date,
                                           "gioBD" datetime,
                                           "thoiLong" integer,
                                           FOREIGN KEY ("M_id") REFERENCES "phim"("M_id") ON DELETE CASCADE,
    primary key("idLC")
    );

-- Các bảng còn lại (đã xóa chuc_vu, khach_hang, nhan_vien, taikhoan, kh_tk)
CREATE TABLE IF NOT EXISTS "migrations"(
                                           "id" integer primary key autoincrement not null,
                                           "migration" varchar not null,
                                           "batch" integer not null
);
CREATE TABLE IF NOT EXISTS "users"(
                                      "id" integer primary key autoincrement not null,
                                      "name" varchar not null,
                                      "phone" varchar,
                                      "province_id" varchar,
                                      "district_id" varchar,
                                      "ward_id" varchar,
                                      "address" varchar,
                                      "birthday" datetime,
                                      "image" varchar,
                                      "description" text,
                                      "user_agent" text,
                                      "ip" text,
                                      "email" varchar not null,
                                      "email_verified_at" datetime,
                                      "password" varchar not null,
                                      "remember_token" varchar,
                                      "created_at" datetime,
                                      "updated_at" datetime,
                                      "role" int,
                                      "otp" int
);
CREATE UNIQUE INDEX "users_email_unique" on "users"("email");
CREATE TABLE IF NOT EXISTS "password_reset_tokens"(
                                                      "email" varchar not null,
                                                      "token" varchar not null,
                                                      "created_at" datetime,
                                                      primary key("email")
    );
CREATE TABLE IF NOT EXISTS "sessions"(
                                         "id" varchar not null,
                                         "user_id" integer,
                                         "ip_address" varchar,
                                         "user_agent" text,
                                         "payload" text not null,
                                         "last_activity" integer not null,
                                         primary key("id")
    );
CREATE INDEX "sessions_user_id_index" on "sessions"("user_id");
CREATE INDEX "sessions_last_activity_index" on "sessions"("last_activity");
CREATE TABLE IF NOT EXISTS "cache"(
                                      "key" varchar not null,
                                      "value" text not null,
                                      "expiration" integer not null,
                                      primary key("key")
    );
CREATE TABLE IF NOT EXISTS "cache_locks"(
                                            "key" varchar not null,
                                            "owner" varchar not null,
                                            "expiration" integer not null,
                                            primary key("key")
    );
CREATE TABLE IF NOT EXISTS "jobs"(
                                     "id" integer primary key autoincrement not null,
                                     "queue" varchar not null,
                                     "payload" text not null,
                                     "attempts" integer not null,
                                     "reserved_at" integer,
                                     "available_at" integer not null,
                                     "created_at" integer not null
);
CREATE INDEX "jobs_queue_index" on "jobs"("queue");
CREATE TABLE IF NOT EXISTS "job_batches"(
                                            "id" varchar not null,
                                            "name" varchar not null,
                                            "total_jobs" integer not null,
                                            "pending_jobs" integer not null,
                                            "failed_jobs" integer not null,
                                            "failed_job_ids" text not null,
                                            "options" text,
                                            "cancelled_at" integer,
                                            "created_at" integer not null,
                                            "finished_at" integer,
                                            primary key("id")
    );
CREATE TABLE IF NOT EXISTS "failed_jobs"(
                                            "id" integer primary key autoincrement not null,
                                            "uuid" varchar not null,
                                            "connection" text not null,
                                            "queue" text not null,
                                            "payload" text not null,
                                            "exception" text not null,
                                            "failed_at" datetime not null default CURRENT_TIMESTAMP
);
CREATE UNIQUE INDEX "failed_jobs_uuid_unique" on "failed_jobs"("uuid");
CREATE TABLE IF NOT EXISTS "ct_hoa_don"(
                                           "idHD" varchar not null,
                                           "idsp" varchar not null,
                                           "SL" integer,
                                           "donGia" float,
                                           primary key("idHD", "idsp")
    );
CREATE TABLE IF NOT EXISTS "ct_phieu_nhap"(
                                              "idPN" varchar not null,
                                              "idsp" varchar not null,
                                              "SL" integer,
                                              "donGia" float,
                                              primary key("idPN", "idsp")
    );
CREATE TABLE IF NOT EXISTS "ghe"(
                                    "PC_id" varchar not null,
                                    "idG" varchar not null,
                                    "status" varchar,
                                    primary key("idG")
    );
CREATE TABLE IF NOT EXISTS "hoa_don"(
                                        "idHD" varchar not null,
                                        "idKH" varchar,
                                        "tongTien" numeric,
                                        "NgayXuat" datetime,
                                        primary key("idHD")
    );
CREATE TABLE IF NOT EXISTS "phong_chieu"(
                                            "PC_id" varchar not null,
                                            "tenPhong" varchar,
                                            "soLuongGhe" integer,
                                            primary key("PC_id")
    );
CREATE TABLE IF NOT EXISTS "ve"(
                                   "idVe" varchar not null,
                                   "idLC" varchar not null,
                                   "idGhe" varchar not null,
                                   "giaVe" numeric,
                                   "trangThai" varchar,
                                   "created_at" datetime,
                                   "updated_at" datetime,
                                   foreign key("idLC") references "lich_chieu"("idLC") on delete cascade,
    foreign key("idGhe") references "ghe"("idG") on delete cascade,
    primary key("idVe")
    );
CREATE TABLE IF NOT EXISTS "san_pham"(
                                         "idsp" varchar not null,
                                         "tenSP" varchar not null,
                                         "donGia" float,
                                         "created_at" datetime,
                                         "updated_at" datetime,
                                         primary key("idsp")
    );
CREATE TABLE IF NOT EXISTS "statistic"(
                                          "id" integer primary key autoincrement not null,
                                          "Ngaydat" date not null,
                                          "Doanhso" numeric not null,
                                          "Lai" numeric not null,
                                          "Soluongdaban" integer not null,
                                          "Tongdon" integer not null,
                                          "created_at" datetime,
                                          "updated_at" datetime
);

INSERT INTO migrations VALUES(1,'0001_01_01_000000_create_users_table',1);
INSERT INTO migrations VALUES(2,'0001_01_01_000001_create_cache_table',1);
INSERT INTO migrations VALUES(3,'0001_01_01_000002_create_jobs_table',1);
INSERT INTO migrations VALUES(4,'2025_03_01_063619_db_migration',1);
INSERT INTO migrations VALUES(5,'2025_03_01_064833_db_migration',1);
INSERT INTO migrations VALUES(6,'2025_03_01_064835_db_migration',1);
INSERT INTO migrations VALUES(30,'2025_03_03_172537_create_lich_chieu_table',2);
INSERT INTO migrations VALUES(32,'2025_03_03_172731_create_phim_table',2);
INSERT INTO migrations VALUES(33,'2025_03_03_172800_create_phong_chieu_table',2);
INSERT INTO migrations VALUES(35,'2025_03_03_172853_create_ve_table',2);
INSERT INTO migrations VALUES(36,'2025_03_21_172033_create_san_pham_table',2);
INSERT INTO migrations VALUES(37,'2025_03_22_111109_create_statistic_table',2);
