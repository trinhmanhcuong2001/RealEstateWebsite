--
-- PostgreSQL database dump
--

-- Dumped from database version 15.2
-- Dumped by pg_dump version 15.2

-- Started on 2024-05-27 22:41:29

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

--
-- TOC entry 2 (class 3079 OID 23882)
-- Name: postgis; Type: EXTENSION; Schema: -; Owner: -
--

CREATE EXTENSION IF NOT EXISTS postgis WITH SCHEMA public;


--
-- TOC entry 4322 (class 0 OID 0)
-- Dependencies: 2
-- Name: EXTENSION postgis; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION postgis IS 'PostGIS geometry and geography spatial types and functions';


SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- TOC entry 238 (class 1259 OID 25103)
-- Name: comments; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.comments (
    id bigint NOT NULL,
    content text NOT NULL,
    user_id bigint NOT NULL,
    property_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.comments OWNER TO postgres;

--
-- TOC entry 237 (class 1259 OID 25102)
-- Name: comments_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.comments_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.comments_id_seq OWNER TO postgres;

--
-- TOC entry 4323 (class 0 OID 0)
-- Dependencies: 237
-- Name: comments_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.comments_id_seq OWNED BY public.comments.id;


--
-- TOC entry 226 (class 1259 OID 25047)
-- Name: failed_jobs; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    uuid character varying(255) NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);


ALTER TABLE public.failed_jobs OWNER TO postgres;

--
-- TOC entry 225 (class 1259 OID 25046)
-- Name: failed_jobs_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.failed_jobs_id_seq OWNER TO postgres;

--
-- TOC entry 4324 (class 0 OID 0)
-- Dependencies: 225
-- Name: failed_jobs_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;


--
-- TOC entry 234 (class 1259 OID 25087)
-- Name: image_description; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.image_description (
    id bigint NOT NULL,
    property_id bigint NOT NULL,
    image_url character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.image_description OWNER TO postgres;

--
-- TOC entry 233 (class 1259 OID 25086)
-- Name: image_description_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.image_description_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.image_description_id_seq OWNER TO postgres;

--
-- TOC entry 4325 (class 0 OID 0)
-- Dependencies: 233
-- Name: image_description_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.image_description_id_seq OWNED BY public.image_description.id;


--
-- TOC entry 232 (class 1259 OID 25080)
-- Name: image_main; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.image_main (
    id bigint NOT NULL,
    property_id bigint NOT NULL,
    image_url character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.image_main OWNER TO postgres;

--
-- TOC entry 231 (class 1259 OID 25079)
-- Name: image_main_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.image_main_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.image_main_id_seq OWNER TO postgres;

--
-- TOC entry 4326 (class 0 OID 0)
-- Dependencies: 231
-- Name: image_main_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.image_main_id_seq OWNED BY public.image_main.id;


--
-- TOC entry 221 (class 1259 OID 24927)
-- Name: migrations; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);


ALTER TABLE public.migrations OWNER TO postgres;

--
-- TOC entry 220 (class 1259 OID 24926)
-- Name: migrations_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.migrations_id_seq OWNER TO postgres;

--
-- TOC entry 4327 (class 0 OID 0)
-- Dependencies: 220
-- Name: migrations_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;


--
-- TOC entry 224 (class 1259 OID 25039)
-- Name: password_reset_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.password_reset_tokens (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);


ALTER TABLE public.password_reset_tokens OWNER TO postgres;

--
-- TOC entry 228 (class 1259 OID 25059)
-- Name: personal_access_tokens; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.personal_access_tokens (
    id bigint NOT NULL,
    tokenable_type character varying(255) NOT NULL,
    tokenable_id bigint NOT NULL,
    name character varying(255) NOT NULL,
    token character varying(64) NOT NULL,
    abilities text,
    last_used_at timestamp(0) without time zone,
    expires_at timestamp(0) without time zone,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.personal_access_tokens OWNER TO postgres;

--
-- TOC entry 227 (class 1259 OID 25058)
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.personal_access_tokens_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.personal_access_tokens_id_seq OWNER TO postgres;

--
-- TOC entry 4328 (class 0 OID 0)
-- Dependencies: 227
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.personal_access_tokens_id_seq OWNED BY public.personal_access_tokens.id;


--
-- TOC entry 230 (class 1259 OID 25071)
-- Name: properties; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.properties (
    id bigint NOT NULL,
    title character varying(255) NOT NULL,
    description text NOT NULL,
    address character varying(255) NOT NULL,
    price numeric(11,0) NOT NULL,
    bedroom integer NOT NULL,
    bathroom integer NOT NULL,
    category character varying(255) NOT NULL,
    geom public.geography(Geometry,4326) NOT NULL,
    user_id bigint NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.properties OWNER TO postgres;

--
-- TOC entry 229 (class 1259 OID 25070)
-- Name: properties_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.properties_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.properties_id_seq OWNER TO postgres;

--
-- TOC entry 4329 (class 0 OID 0)
-- Dependencies: 229
-- Name: properties_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.properties_id_seq OWNED BY public.properties.id;


--
-- TOC entry 236 (class 1259 OID 25094)
-- Name: reviews; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.reviews (
    id bigint NOT NULL,
    property_id bigint NOT NULL,
    user_id bigint NOT NULL,
    comment text NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.reviews OWNER TO postgres;

--
-- TOC entry 235 (class 1259 OID 25093)
-- Name: reviews_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.reviews_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.reviews_id_seq OWNER TO postgres;

--
-- TOC entry 4330 (class 0 OID 0)
-- Dependencies: 235
-- Name: reviews_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.reviews_id_seq OWNED BY public.reviews.id;


--
-- TOC entry 223 (class 1259 OID 25027)
-- Name: users; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.users (
    id bigint NOT NULL,
    username character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    password character varying(255) NOT NULL,
    full_name character varying(255) NOT NULL,
    address character varying(255) NOT NULL,
    phone_number character varying(255) NOT NULL,
    role integer NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);


ALTER TABLE public.users OWNER TO postgres;

--
-- TOC entry 222 (class 1259 OID 25026)
-- Name: users_id_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.users_id_seq OWNER TO postgres;

--
-- TOC entry 4331 (class 0 OID 0)
-- Dependencies: 222
-- Name: users_id_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;


--
-- TOC entry 4118 (class 2604 OID 25106)
-- Name: comments id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comments ALTER COLUMN id SET DEFAULT nextval('public.comments_id_seq'::regclass);


--
-- TOC entry 4111 (class 2604 OID 25050)
-- Name: failed_jobs id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);


--
-- TOC entry 4116 (class 2604 OID 25090)
-- Name: image_description id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.image_description ALTER COLUMN id SET DEFAULT nextval('public.image_description_id_seq'::regclass);


--
-- TOC entry 4115 (class 2604 OID 25083)
-- Name: image_main id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.image_main ALTER COLUMN id SET DEFAULT nextval('public.image_main_id_seq'::regclass);


--
-- TOC entry 4109 (class 2604 OID 24930)
-- Name: migrations id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);


--
-- TOC entry 4113 (class 2604 OID 25062)
-- Name: personal_access_tokens id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens ALTER COLUMN id SET DEFAULT nextval('public.personal_access_tokens_id_seq'::regclass);


--
-- TOC entry 4114 (class 2604 OID 25074)
-- Name: properties id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.properties ALTER COLUMN id SET DEFAULT nextval('public.properties_id_seq'::regclass);


--
-- TOC entry 4117 (class 2604 OID 25097)
-- Name: reviews id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reviews ALTER COLUMN id SET DEFAULT nextval('public.reviews_id_seq'::regclass);


--
-- TOC entry 4110 (class 2604 OID 25030)
-- Name: users id; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);


--
-- TOC entry 4316 (class 0 OID 25103)
-- Dependencies: 238
-- Data for Name: comments; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (1, 'test bình luận', 3, 2, '2024-05-25 14:35:27', '2024-05-25 14:35:27');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (2, 'haha', 3, 2, '2024-05-25 14:35:59', '2024-05-25 14:35:59');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (3, 'hehe', 3, 2, '2024-05-25 14:36:19', '2024-05-25 14:36:19');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (4, 'ahihi', 3, 2, '2024-05-25 14:36:30', '2024-05-25 14:36:30');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (5, '123', 3, 2, '2024-05-25 14:36:56', '2024-05-25 14:36:56');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (6, '333', 3, 2, '2024-05-25 14:37:03', '2024-05-25 14:37:03');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (7, 'alo', 3, 1, '2024-05-25 14:37:16', '2024-05-25 14:37:16');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (8, 'lolo', 3, 1, '2024-05-25 14:37:23', '2024-05-25 14:37:23');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (9, 'abv', 3, 1, '2024-05-25 22:04:19', '2024-05-25 22:04:19');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (10, 'et', 3, 1, '2024-05-25 22:13:30', '2024-05-25 22:13:30');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (11, 'a', 3, 1, '2024-05-25 22:14:57', '2024-05-25 22:14:57');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (12, 'faf', 3, 1, '2024-05-25 22:15:55', '2024-05-25 22:15:55');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (13, 'fafa', 3, 1, '2024-05-25 22:16:41', '2024-05-25 22:16:41');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (14, 'fafaaa', 3, 1, '2024-05-25 22:17:01', '2024-05-25 22:17:01');
INSERT INTO public.comments (id, content, user_id, property_id, created_at, updated_at) VALUES (15, 'àasf', 3, 1, '2024-05-25 22:17:30', '2024-05-25 22:17:30');


--
-- TOC entry 4304 (class 0 OID 25047)
-- Dependencies: 226
-- Data for Name: failed_jobs; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 4312 (class 0 OID 25087)
-- Dependencies: 234
-- Data for Name: image_description; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.image_description (id, property_id, image_url, created_at, updated_at) VALUES (1, 1, 'storage/uploads/properties/description/2024-05-23/16/01/35/img_6.jpg', '2024-05-23 16:01:35', '2024-05-23 16:01:35');
INSERT INTO public.image_description (id, property_id, image_url, created_at, updated_at) VALUES (2, 1, 'storage/uploads/properties/description/2024-05-23/16/01/35/img_7.jpg', '2024-05-23 16:01:35', '2024-05-23 16:01:35');
INSERT INTO public.image_description (id, property_id, image_url, created_at, updated_at) VALUES (3, 1, 'storage/uploads/properties/description/2024-05-23/16/01/35/img_8.jpg', '2024-05-23 16:01:35', '2024-05-23 16:01:35');
INSERT INTO public.image_description (id, property_id, image_url, created_at, updated_at) VALUES (4, 2, 'storage/uploads/properties/description/2024-05-23/16/03/20/img_1.jpg', '2024-05-23 16:03:20', '2024-05-23 16:03:20');
INSERT INTO public.image_description (id, property_id, image_url, created_at, updated_at) VALUES (5, 2, 'storage/uploads/properties/description/2024-05-23/16/03/20/img_2.jpg', '2024-05-23 16:03:20', '2024-05-23 16:03:20');
INSERT INTO public.image_description (id, property_id, image_url, created_at, updated_at) VALUES (6, 2, 'storage/uploads/properties/description/2024-05-23/16/03/20/img_3.jpg', '2024-05-23 16:03:20', '2024-05-23 16:03:20');


--
-- TOC entry 4310 (class 0 OID 25080)
-- Dependencies: 232
-- Data for Name: image_main; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.image_main (id, property_id, image_url, created_at, updated_at) VALUES (1, 1, 'storage/uploads/properties/main/2024-05-23/16/01/35/hero_bg_3.jpg', '2024-05-23 16:01:35', '2024-05-23 16:01:35');
INSERT INTO public.image_main (id, property_id, image_url, created_at, updated_at) VALUES (2, 2, 'storage/uploads/properties/main/2024-05-23/16/03/20/img_4.jpg', '2024-05-23 16:03:20', '2024-05-23 16:03:20');


--
-- TOC entry 4299 (class 0 OID 24927)
-- Dependencies: 221
-- Data for Name: migrations; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.migrations (id, migration, batch) VALUES (10, '2014_10_12_000000_create_users_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (11, '2014_10_12_100000_create_password_reset_tokens_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (12, '2019_08_19_000000_create_failed_jobs_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (13, '2019_12_14_000001_create_personal_access_tokens_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (14, '2024_03_17_142520_create_properties_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (15, '2024_03_17_150412_create_image_main_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (16, '2024_03_17_150651_create_image_description_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (17, '2024_03_17_150827_create_reviews_table', 1);
INSERT INTO public.migrations (id, migration, batch) VALUES (18, '2024_04_06_133937_create_comments_table', 1);


--
-- TOC entry 4302 (class 0 OID 25039)
-- Dependencies: 224
-- Data for Name: password_reset_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 4306 (class 0 OID 25059)
-- Dependencies: 228
-- Data for Name: personal_access_tokens; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 4308 (class 0 OID 25071)
-- Dependencies: 230
-- Data for Name: properties; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.properties (id, title, description, address, price, bedroom, bathroom, category, geom, user_id, created_at, updated_at) VALUES (1, 'BÁN NHÀ NGUYỄN VĂN LỘC - TRUNG TÂM HÀ ĐÔNG - KHU VỰC HIẾM NHÀ BÁN - TIỆN ÍCH KHU - PHỐ VIP HÀ ĐÔNG', '<p><img src="https://static.chotot.com/storage/icons/logos/ad-param/size.png" alt="Diện tích đất" width="20" height="20"></p><p>Diện tích đất: 37 m²</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/price_m2.png" alt="Giá/m2" width="20" height="20"></p><p>Giá/m2: 160,81 triệu/m²</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/rooms.png" alt="Số phòng ngủ" width="20" height="20"></p><p>Số phòng ngủ: 3 phòng</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/toilets.png" alt="Số phòng vệ sinh" width="20" height="20"></p><p>Số phòng vệ sinh: 4 phòng</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/floors.png" alt="Tổng số tầng" width="20" height="20"></p><p>Tổng số tầng: 5</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/property_legal_document.png" alt="Giấy tờ pháp lý" width="20" height="20"></p><p>Giấy tờ pháp lý: Đã có sổ</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/house_type.png" alt="Loại hình nhà ở" width="20" height="20"></p><p>Loại hình nhà ở: Nhà ngõ, hẻm</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/furnishing_sell.png" alt="Tình trạng nội thất" width="20" height="20"></p><p>Tình trạng nội thất: Nội thất đầy đủ</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/living_size.png" alt="Diện tích sử dụng" width="20" height="20"></p><p>Diện tích sử dụng: 37 m²</p><p>BÁN NHÀ NGUYỄN VĂN LỘC - TRUNG TÂM HÀ ĐÔNG - KHU VỰC HIẾM NHÀ BÁN - TIỆN ÍCH KHU - PHỐ VIP HÀ ĐÔNG</p><p>&nbsp;-Bán nhà Nguyễn Văn Lộc 38m2, 5 tầng, Giá chào 5,95 tỷ có thương lượng - Vị trí trung tâm Hà Đông xung quanh là các Khu đô thị Mỗ Lao, Làng Việt Kiều châu Âu, Khu đô thị Văn Quán, hưởng trọn tiện ích..&nbsp;</p><p>- Ngõ Nguyễn Văn Lộc Ô tô tránh thông sang Phố Ao Sen sầm uất, kinh doanh tập nập, nhà cách oto dừng đỗ 15m. Giao thông thuận tiện kết nối các khu vực.&nbsp;</p><p>Thiết kế: 5 tầng, 3 ngủ(có thể thêm thành 4 ngủ), 5 vệ sinh&nbsp;</p><p>+ Tầng 1: Phòng khách , bếp, sân để xe, vệ sinh.&nbsp;</p><p>+ Tầng 2-3-4 : mỗi tầng 1 PN + vệ sinh khép kín, thoáng, ban công&nbsp;</p><p>+ Tầng 5: phòng thờ, tum, sân phơi - Sổ đỏ chính chủ chờ giao dịch. Liên hệ em để xem nhà trực tiếp ***</p>', 'Phố Nguyễn Văn Lộc, Phường Mộ Lao, Quận Hà Đông, Hà Nội', 5950000000, 3, 4, 'Căn hộ', '0101000020E6100000DD184C0DFE715A40F764B4441DFC3440', 3, '2024-05-23 16:01:35', '2024-05-23 16:01:35');
INSERT INTO public.properties (id, title, description, address, price, bedroom, bathroom, category, geom, user_id, created_at, updated_at) VALUES (2, 'Siêu hiếm bán nhà 5 tầng 105 Doãn Kế Thiện 10m ra đường ôtô', '<p><img src="https://static.chotot.com/storage/icons/logos/ad-param/size.png" alt="Diện tích đất" width="20" height="20"></p><p>Diện tích đất: 30 m²</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/price_m2.png" alt="Giá/m2" width="20" height="20"></p><p>Giá/m2: 198,33 triệu/m²</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/rooms.png" alt="Số phòng ngủ" width="20" height="20"></p><p>Số phòng ngủ: 3 phòng</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/toilets.png" alt="Số phòng vệ sinh" width="20" height="20"></p><p>Số phòng vệ sinh: 4 phòng</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/floors.png" alt="Tổng số tầng" width="20" height="20"></p><p>Tổng số tầng: 5</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/property_legal_document.png" alt="Giấy tờ pháp lý" width="20" height="20"></p><p>Giấy tờ pháp lý: Giấy tờ viết tay</p><p><img src="https://static.chotot.com/storage/icons/logos/ad-param/house_type.png" alt="Loại hình nhà ở" width="20" height="20"></p><p>Loại hình nhà ở: Nhà ngõ, hẻm</p><p>- Diện tích : 30m2 như tờ A4. - Nhà thiết kế 5 tầng. + Tầng 1 phòng khách , wc + Tầng 2, 3, 4 mỗi phòng 1 PN , WC riêng + Tầng 5 phòng thờ , sân phơi - Cách 10m ra đường ôtô lớn , giao thông thuận lợi , đầy đủ tiện ích xung quanh chợ , trường học , bệnh viện , siêu thị - Chủ để lại full nội thất của ToTo. - Giá 5.950 tỷ có thương lượng. - Sổ cất két sãn sàng giao dịch. ACE quan tâm liên hệ E Dương:</p>', 'Phố Doãn Kế Thiện, Phường Mai Dịch, Quận Cầu Giấy, Hà Nội', 5950000000, 3, 4, 'Căn hộ', '0101000020E610000021E4BCFF8F715A40DF4037EAD70A3540', 3, '2024-05-23 16:03:20', '2024-05-23 16:03:20');


--
-- TOC entry 4314 (class 0 OID 25094)
-- Dependencies: 236
-- Data for Name: reviews; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 4108 (class 0 OID 24195)
-- Dependencies: 216
-- Data for Name: spatial_ref_sys; Type: TABLE DATA; Schema: public; Owner: postgres
--



--
-- TOC entry 4301 (class 0 OID 25027)
-- Dependencies: 223
-- Data for Name: users; Type: TABLE DATA; Schema: public; Owner: postgres
--

INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (4, 'minhte27', 'minhte27@gmail.com', '$2y$12$2HB8S52VZC7q34E/RxcAjOfsBG4/Cd9xtFAfUi4rpnVJUSj6rtZ/C', 'Minh Tề', 'Phố Trích Sài, Phường Thụy Khuê, Quận Tây Hồ, Hà Nội', '0963556345', 1, NULL, '2024-05-23 15:57:20', '2024-05-23 15:57:20');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (3, 'admin', 'cuong69pro@gmail.com', '$2y$12$PwveTRezJixu7AhzQrNJOeo60fOmfcdtwdNu4IVicwVE38gfa6D9y', 'Trịnh Mạnh Cường', 'Mạnh Tân -Thụy Lâm - Đông Anh - Hà Nội', '0961551260', 0, NULL, '2024-05-23 15:51:08', '2024-05-24 19:06:44');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (5, 'emily.hyatt', 'edubuque@example.net', '$2y$12$8oJ/k/FCasyd8sLr1evvj.65iDq.mWIEvP1CMqV7cE/F0UjyodvnS', 'Nicholaus Schmeler', '4778 Lura Mountain
East Websterton, AL 19925', '+1 (201) 570-7818', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (6, 'smith.teresa', 'jay37@example.net', '$2y$12$I5BFxq7tI3tfJ9EvYrYaGu0TF5hiwrtxI6WnFTF8EoHYsZDQeXeT.', 'Mr. Camden Crona', '7871 Gregory Mount
Schadenfurt, AZ 78032', '+1-930-745-9937', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (8, 'cleta.friesen', 'lakin.sophie@example.org', '$2y$12$GWNQHqikx6IiC0hONIR28.a1.BZ4E6AqV1TE5pSEdZWwsKAbr2KLy', 'Prof. Guy Schinner DDS', '8867 Brennan Skyway
East Orieshire, NY 14300', '1-980-801-2244', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (10, 'qbartell', 'clementine54@example.org', '$2y$12$sNy/oAOqSymCFcU6d5HN6.saWSsPkWzfHPOGe7Oroe3vzlg4CVKqW', 'Ms. Marcella Strosin Sr.', '5930 Lakin Ramp Apt. 922
New Suzannemouth, IN 46556', '(614) 565-0206', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (11, 'harvey.roxanne', 'orrin.macejkovic@example.com', '$2y$12$raw3C7rGyRmId57Dy4Xee.W6jb0sSwsEeVKby1Kh1Xfn22MRdeeoy', 'Mrs. Lempi Paucek III', '482 Rodriguez Crescent
North Elenaville, RI 70793-4507', '+1 (862) 248-5222', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (12, 'cbartoletti', 'zoey.kling@example.org', '$2y$12$LrhukXARljzpui7bO44egOlIxZWbdnh9a8AsCAecky0TCua1kUy5u', 'Colleen Mayert', '9750 Davis Cliffs
Margaritaport, NY 13022', '(470) 568-5660', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (13, 'zrosenbaum', 'fay.joshua@example.com', '$2y$12$/5l7niu1xEmeCLGkvvo/3.IFTlat0fSK/QkCTa48.Do9rSVDO3GAq', 'Dr. Gage McCullough II', '6877 Pfannerstill Dale Apt. 980
Mafaldaville, CT 37885', '1-951-389-5569', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (14, 'garth21', 'apacocha@example.org', '$2y$12$ghx2Cv2HqKG0D8KE11mppe78wGBFoJmRXBXHkIY.qBtg6Tx80imBa', 'Bryana Gutkowski DDS', '787 Prohaska Rapid Apt. 975
New Charityport, WI 31173', '(571) 520-1047', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (15, 'nlowe', 'georgette.crist@example.com', '$2y$12$JurlKNiDXpKV5NHWIHMwgejqi8LEYe7RpRednPxjL4ZBGDNH.Uoj6', 'Trevor Mosciski', '719 Upton Village Suite 223
North Vitobury, OK 61408-1382', '272.390.6490', 0, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (17, 'orlando.kilback', 'rodger31@example.net', '$2y$12$pgWHK/EYrbwhWJNj4s3JcuSjuMg8ULidsxYPHqiwDNUgjLKYeAOC2', 'Watson Rau', '4619 Will Rapid Suite 498
Heberland, GA 57250', '318.352.8735', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (18, 'donnelly.zella', 'rossie83@example.com', '$2y$12$wyIv7SfMGRPM1XC18Eo3Ku.CXpz8BaR5kFYpdGpIHImUnLwdietRm', 'Dr. Aliyah Shields', '7635 Jeramy Springs Suite 950
Marcoberg, NE 58449-4696', '+13515216090', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (19, 'hartmann.lafayette', 'pamela74@example.net', '$2y$12$KFUaj.uXEbqSRWbOkfQ7ceiMuogJl8.L4L9UpBZ.t8dZ1TxpOl3pC', 'Jackson Reichert', '80981 Boehm Spur Suite 865
South Giovannaton, AZ 90305', '+1-773-802-1884', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (20, 'gstiedemann', 'rex.schmidt@example.com', '$2y$12$zITtU1XD9NVTRSoCNP7aQeGdCLObTDja7OHXPEZeQ2mbbB61g5eym', 'Ahmed Smith DDS', '56995 Bogan Ford
Martinaside, ND 99674', '+1-903-797-0953', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (23, 'skiles.emma', 'adan.buckridge@example.org', '$2y$12$TESMHbDco5nkwO4lGUPFsO7XsdMszf5fzRfft5isK9OKap2FHVCHO', 'Brittany Runte', '50074 Alanis Plaza Suite 945
Schmittfort, NV 05557', '930-633-2129', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');
INSERT INTO public.users (id, username, email, password, full_name, address, phone_number, role, remember_token, created_at, updated_at) VALUES (24, 'njast', 'hamill.jaida@example.org', '$2y$12$ggxOmteRtoxhwP7VNtJZqO.v.FG3h3T/h/lOu3iUzBEqy.CTNY0nW', 'Mr. Rodolfo Runolfsdottir Sr.', '94775 Jarvis Springs
Glovertown, MS 82322-8866', '(931) 803-6154', 1, NULL, '2024-05-25 23:37:59', '2024-05-25 23:37:59');


--
-- TOC entry 4332 (class 0 OID 0)
-- Dependencies: 237
-- Name: comments_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.comments_id_seq', 15, true);


--
-- TOC entry 4333 (class 0 OID 0)
-- Dependencies: 225
-- Name: failed_jobs_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);


--
-- TOC entry 4334 (class 0 OID 0)
-- Dependencies: 233
-- Name: image_description_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.image_description_id_seq', 6, true);


--
-- TOC entry 4335 (class 0 OID 0)
-- Dependencies: 231
-- Name: image_main_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.image_main_id_seq', 2, true);


--
-- TOC entry 4336 (class 0 OID 0)
-- Dependencies: 220
-- Name: migrations_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.migrations_id_seq', 18, true);


--
-- TOC entry 4337 (class 0 OID 0)
-- Dependencies: 227
-- Name: personal_access_tokens_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.personal_access_tokens_id_seq', 1, false);


--
-- TOC entry 4338 (class 0 OID 0)
-- Dependencies: 229
-- Name: properties_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.properties_id_seq', 2, true);


--
-- TOC entry 4339 (class 0 OID 0)
-- Dependencies: 235
-- Name: reviews_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.reviews_id_seq', 1, false);


--
-- TOC entry 4340 (class 0 OID 0)
-- Dependencies: 222
-- Name: users_id_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.users_id_seq', 24, true);


--
-- TOC entry 4150 (class 2606 OID 25110)
-- Name: comments comments_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.comments
    ADD CONSTRAINT comments_pkey PRIMARY KEY (id);


--
-- TOC entry 4133 (class 2606 OID 25055)
-- Name: failed_jobs failed_jobs_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);


--
-- TOC entry 4135 (class 2606 OID 25057)
-- Name: failed_jobs failed_jobs_uuid_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_uuid_unique UNIQUE (uuid);


--
-- TOC entry 4146 (class 2606 OID 25092)
-- Name: image_description image_description_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.image_description
    ADD CONSTRAINT image_description_pkey PRIMARY KEY (id);


--
-- TOC entry 4144 (class 2606 OID 25085)
-- Name: image_main image_main_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.image_main
    ADD CONSTRAINT image_main_pkey PRIMARY KEY (id);


--
-- TOC entry 4123 (class 2606 OID 24932)
-- Name: migrations migrations_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);


--
-- TOC entry 4131 (class 2606 OID 25045)
-- Name: password_reset_tokens password_reset_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.password_reset_tokens
    ADD CONSTRAINT password_reset_tokens_pkey PRIMARY KEY (email);


--
-- TOC entry 4137 (class 2606 OID 25066)
-- Name: personal_access_tokens personal_access_tokens_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_pkey PRIMARY KEY (id);


--
-- TOC entry 4139 (class 2606 OID 25069)
-- Name: personal_access_tokens personal_access_tokens_token_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.personal_access_tokens
    ADD CONSTRAINT personal_access_tokens_token_unique UNIQUE (token);


--
-- TOC entry 4142 (class 2606 OID 25078)
-- Name: properties properties_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.properties
    ADD CONSTRAINT properties_pkey PRIMARY KEY (id);


--
-- TOC entry 4148 (class 2606 OID 25101)
-- Name: reviews reviews_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.reviews
    ADD CONSTRAINT reviews_pkey PRIMARY KEY (id);


--
-- TOC entry 4125 (class 2606 OID 25038)
-- Name: users users_email_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);


--
-- TOC entry 4127 (class 2606 OID 25034)
-- Name: users users_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);


--
-- TOC entry 4129 (class 2606 OID 25036)
-- Name: users users_username_unique; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_username_unique UNIQUE (username);


--
-- TOC entry 4140 (class 1259 OID 25067)
-- Name: personal_access_tokens_tokenable_type_tokenable_id_index; Type: INDEX; Schema: public; Owner: postgres
--

CREATE INDEX personal_access_tokens_tokenable_type_tokenable_id_index ON public.personal_access_tokens USING btree (tokenable_type, tokenable_id);


-- Completed on 2024-05-27 22:41:30

--
-- PostgreSQL database dump complete
--

