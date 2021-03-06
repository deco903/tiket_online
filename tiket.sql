PGDMP                          y            tiket    10.12    10.12 8    5           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                       false            6           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                       false            7           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                       false            8           1262    33808    tiket    DATABASE     ?   CREATE DATABASE tiket WITH TEMPLATE = template0 ENCODING = 'UTF8' LC_COLLATE = 'English_Indonesia.1252' LC_CTYPE = 'English_Indonesia.1252';
    DROP DATABASE tiket;
             postgres    false                        2615    2200    public    SCHEMA        CREATE SCHEMA public;
    DROP SCHEMA public;
             postgres    false            9           0    0    SCHEMA public    COMMENT     6   COMMENT ON SCHEMA public IS 'standard public schema';
                  postgres    false    3                        3079    12924    plpgsql 	   EXTENSION     ?   CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;
    DROP EXTENSION plpgsql;
                  false            :           0    0    EXTENSION plpgsql    COMMENT     @   COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';
                       false    1            ?            1259    33839    failed_jobs    TABLE     ?   CREATE TABLE public.failed_jobs (
    id bigint NOT NULL,
    connection text NOT NULL,
    queue text NOT NULL,
    payload text NOT NULL,
    exception text NOT NULL,
    failed_at timestamp(0) without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.failed_jobs;
       public         postgres    false    3            ?            1259    33837    failed_jobs_id_seq    SEQUENCE     {   CREATE SEQUENCE public.failed_jobs_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 )   DROP SEQUENCE public.failed_jobs_id_seq;
       public       postgres    false    202    3            ;           0    0    failed_jobs_id_seq    SEQUENCE OWNED BY     I   ALTER SEQUENCE public.failed_jobs_id_seq OWNED BY public.failed_jobs.id;
            public       postgres    false    201            ?            1259    33971 	   kategoris    TABLE     ?   CREATE TABLE public.kategoris (
    id bigint NOT NULL,
    nama_kategori character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.kategoris;
       public         postgres    false    3            ?            1259    33969    kategoris_id_seq    SEQUENCE     y   CREATE SEQUENCE public.kategoris_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 '   DROP SEQUENCE public.kategoris_id_seq;
       public       postgres    false    204    3            <           0    0    kategoris_id_seq    SEQUENCE OWNED BY     E   ALTER SEQUENCE public.kategoris_id_seq OWNED BY public.kategoris.id;
            public       postgres    false    203            ?            1259    33811 
   migrations    TABLE     ?   CREATE TABLE public.migrations (
    id integer NOT NULL,
    migration character varying(255) NOT NULL,
    batch integer NOT NULL
);
    DROP TABLE public.migrations;
       public         postgres    false    3            ?            1259    33809    migrations_id_seq    SEQUENCE     ?   CREATE SEQUENCE public.migrations_id_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.migrations_id_seq;
       public       postgres    false    3    197            =           0    0    migrations_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.migrations_id_seq OWNED BY public.migrations.id;
            public       postgres    false    196            ?            1259    33830    password_resets    TABLE     ?   CREATE TABLE public.password_resets (
    email character varying(255) NOT NULL,
    token character varying(255) NOT NULL,
    created_at timestamp(0) without time zone
);
 #   DROP TABLE public.password_resets;
       public         postgres    false    3            ?            1259    33993    tikets    TABLE     {  CREATE TABLE public.tikets (
    id bigint NOT NULL,
    id_kategori integer NOT NULL,
    name_tiket character varying(255) NOT NULL,
    harga_tiket character varying(255) NOT NULL,
    jenis_tiket character varying(255) NOT NULL,
    jumlah_tiket character varying(255) NOT NULL,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.tikets;
       public         postgres    false    3            ?            1259    33991    tikets_id_seq    SEQUENCE     v   CREATE SEQUENCE public.tikets_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 $   DROP SEQUENCE public.tikets_id_seq;
       public       postgres    false    3    206            >           0    0    tikets_id_seq    SEQUENCE OWNED BY     ?   ALTER SEQUENCE public.tikets_id_seq OWNED BY public.tikets.id;
            public       postgres    false    205            ?            1259    34009 
   transaksis    TABLE       CREATE TABLE public.transaksis (
    id bigint NOT NULL,
    id_tiket integer NOT NULL,
    qty character varying(255) NOT NULL,
    status boolean DEFAULT false,
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.transaksis;
       public         postgres    false    3            ?            1259    34007    transaksis_id_seq    SEQUENCE     z   CREATE SEQUENCE public.transaksis_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 (   DROP SEQUENCE public.transaksis_id_seq;
       public       postgres    false    208    3            ?           0    0    transaksis_id_seq    SEQUENCE OWNED BY     G   ALTER SEQUENCE public.transaksis_id_seq OWNED BY public.transaksis.id;
            public       postgres    false    207            ?            1259    33819    users    TABLE     x  CREATE TABLE public.users (
    id bigint NOT NULL,
    name character varying(255) NOT NULL,
    email character varying(255) NOT NULL,
    email_verified_at timestamp(0) without time zone,
    password character varying(255) NOT NULL,
    remember_token character varying(100),
    created_at timestamp(0) without time zone,
    updated_at timestamp(0) without time zone
);
    DROP TABLE public.users;
       public         postgres    false    3            ?            1259    33817    users_id_seq    SEQUENCE     u   CREATE SEQUENCE public.users_id_seq
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 #   DROP SEQUENCE public.users_id_seq;
       public       postgres    false    3    199            @           0    0    users_id_seq    SEQUENCE OWNED BY     =   ALTER SEQUENCE public.users_id_seq OWNED BY public.users.id;
            public       postgres    false    198            ?
           2604    33842    failed_jobs id    DEFAULT     p   ALTER TABLE ONLY public.failed_jobs ALTER COLUMN id SET DEFAULT nextval('public.failed_jobs_id_seq'::regclass);
 =   ALTER TABLE public.failed_jobs ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    201    202    202            ?
           2604    33974    kategoris id    DEFAULT     l   ALTER TABLE ONLY public.kategoris ALTER COLUMN id SET DEFAULT nextval('public.kategoris_id_seq'::regclass);
 ;   ALTER TABLE public.kategoris ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    204    203    204            ?
           2604    33814    migrations id    DEFAULT     n   ALTER TABLE ONLY public.migrations ALTER COLUMN id SET DEFAULT nextval('public.migrations_id_seq'::regclass);
 <   ALTER TABLE public.migrations ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    197    196    197            ?
           2604    33996 	   tikets id    DEFAULT     f   ALTER TABLE ONLY public.tikets ALTER COLUMN id SET DEFAULT nextval('public.tikets_id_seq'::regclass);
 8   ALTER TABLE public.tikets ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    205    206    206            ?
           2604    34012    transaksis id    DEFAULT     n   ALTER TABLE ONLY public.transaksis ALTER COLUMN id SET DEFAULT nextval('public.transaksis_id_seq'::regclass);
 <   ALTER TABLE public.transaksis ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    208    207    208            ?
           2604    33822    users id    DEFAULT     d   ALTER TABLE ONLY public.users ALTER COLUMN id SET DEFAULT nextval('public.users_id_seq'::regclass);
 7   ALTER TABLE public.users ALTER COLUMN id DROP DEFAULT;
       public       postgres    false    198    199    199            ,          0    33839    failed_jobs 
   TABLE DATA               [   COPY public.failed_jobs (id, connection, queue, payload, exception, failed_at) FROM stdin;
    public       postgres    false    202   ?<       .          0    33971 	   kategoris 
   TABLE DATA               N   COPY public.kategoris (id, nama_kategori, created_at, updated_at) FROM stdin;
    public       postgres    false    204   ?<       '          0    33811 
   migrations 
   TABLE DATA               :   COPY public.migrations (id, migration, batch) FROM stdin;
    public       postgres    false    197   b=       *          0    33830    password_resets 
   TABLE DATA               C   COPY public.password_resets (email, token, created_at) FROM stdin;
    public       postgres    false    200   >       0          0    33993    tikets 
   TABLE DATA               }   COPY public.tikets (id, id_kategori, name_tiket, harga_tiket, jenis_tiket, jumlah_tiket, created_at, updated_at) FROM stdin;
    public       postgres    false    206   #>       2          0    34009 
   transaksis 
   TABLE DATA               W   COPY public.transaksis (id, id_tiket, qty, status, created_at, updated_at) FROM stdin;
    public       postgres    false    208   ?>       )          0    33819    users 
   TABLE DATA               u   COPY public.users (id, name, email, email_verified_at, password, remember_token, created_at, updated_at) FROM stdin;
    public       postgres    false    199   C?       A           0    0    failed_jobs_id_seq    SEQUENCE SET     A   SELECT pg_catalog.setval('public.failed_jobs_id_seq', 1, false);
            public       postgres    false    201            B           0    0    kategoris_id_seq    SEQUENCE SET     >   SELECT pg_catalog.setval('public.kategoris_id_seq', 5, true);
            public       postgres    false    203            C           0    0    migrations_id_seq    SEQUENCE SET     ?   SELECT pg_catalog.setval('public.migrations_id_seq', 9, true);
            public       postgres    false    196            D           0    0    tikets_id_seq    SEQUENCE SET     ;   SELECT pg_catalog.setval('public.tikets_id_seq', 3, true);
            public       postgres    false    205            E           0    0    transaksis_id_seq    SEQUENCE SET     @   SELECT pg_catalog.setval('public.transaksis_id_seq', 12, true);
            public       postgres    false    207            F           0    0    users_id_seq    SEQUENCE SET     :   SELECT pg_catalog.setval('public.users_id_seq', 6, true);
            public       postgres    false    198            ?
           2606    33848    failed_jobs failed_jobs_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.failed_jobs
    ADD CONSTRAINT failed_jobs_pkey PRIMARY KEY (id);
 F   ALTER TABLE ONLY public.failed_jobs DROP CONSTRAINT failed_jobs_pkey;
       public         postgres    false    202            ?
           2606    33976    kategoris kategoris_pkey 
   CONSTRAINT     V   ALTER TABLE ONLY public.kategoris
    ADD CONSTRAINT kategoris_pkey PRIMARY KEY (id);
 B   ALTER TABLE ONLY public.kategoris DROP CONSTRAINT kategoris_pkey;
       public         postgres    false    204            ?
           2606    33816    migrations migrations_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.migrations
    ADD CONSTRAINT migrations_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.migrations DROP CONSTRAINT migrations_pkey;
       public         postgres    false    197            ?
           2606    34001    tikets tikets_pkey 
   CONSTRAINT     P   ALTER TABLE ONLY public.tikets
    ADD CONSTRAINT tikets_pkey PRIMARY KEY (id);
 <   ALTER TABLE ONLY public.tikets DROP CONSTRAINT tikets_pkey;
       public         postgres    false    206            ?
           2606    34015    transaksis transaksis_pkey 
   CONSTRAINT     X   ALTER TABLE ONLY public.transaksis
    ADD CONSTRAINT transaksis_pkey PRIMARY KEY (id);
 D   ALTER TABLE ONLY public.transaksis DROP CONSTRAINT transaksis_pkey;
       public         postgres    false    208            ?
           2606    33829    users users_email_unique 
   CONSTRAINT     T   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_email_unique UNIQUE (email);
 B   ALTER TABLE ONLY public.users DROP CONSTRAINT users_email_unique;
       public         postgres    false    199            ?
           2606    33827    users users_pkey 
   CONSTRAINT     N   ALTER TABLE ONLY public.users
    ADD CONSTRAINT users_pkey PRIMARY KEY (id);
 :   ALTER TABLE ONLY public.users DROP CONSTRAINT users_pkey;
       public         postgres    false    199            ?
           1259    33836    password_resets_email_index    INDEX     X   CREATE INDEX password_resets_email_index ON public.password_resets USING btree (email);
 /   DROP INDEX public.password_resets_email_index;
       public         postgres    false    200            ?
           2606    34002 !   tikets tikets_id_kategori_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.tikets
    ADD CONSTRAINT tikets_id_kategori_foreign FOREIGN KEY (id_kategori) REFERENCES public.kategoris(id) ON DELETE CASCADE;
 K   ALTER TABLE ONLY public.tikets DROP CONSTRAINT tikets_id_kategori_foreign;
       public       postgres    false    2726    206    204            ?
           2606    34016 &   transaksis transaksis_id_tiket_foreign    FK CONSTRAINT     ?   ALTER TABLE ONLY public.transaksis
    ADD CONSTRAINT transaksis_id_tiket_foreign FOREIGN KEY (id_tiket) REFERENCES public.tikets(id) ON DELETE CASCADE;
 P   ALTER TABLE ONLY public.transaksis DROP CONSTRAINT transaksis_id_tiket_foreign;
       public       postgres    false    208    206    2728            ,      x?????? ? ?      .   p   x?m?1? ?ᙞ?hhM8?KM:??x}?????I????j?~?r??Á?>?ݢ??mO??4??o??????3?5?RΜl?G?t??Ah?u???'?`??-A      '   ?   x?U???0?g?1f??1?R̈́?Yg?}?dN?pӇs?Rc4? 2???%qȌ?p?0.ܐ2???D?k??X8׊?+?Ǟ??5ą'?ױ?nㆠ	?B??w]???5ł[?+?A??k?q?_85?????߶"SxH?%V}>)?>]?T      *      x?????? ? ?      0   ?   x?m?M
?@?u?s?$??,ݤ("?q?Eo_J)?!???S?6's?Rֹ?K?I?>??????[??pT [??*a>??蛒?|HmV???%???'#??Ia?'??K,w5????S??փF???Z????,?O?v1Ƽ MI?      2   f   x?m???0??]?(vڪd?L???~@@%?Η???!4"3<???a?3v???̧M?&|?%Y?p~Y??s??wI&x??3?????F???gL?EUOY,      )     x?m?MO?0 @??+v?:lK??IP?[?-0?.L?J??׫'3??{?KRJ&ʺ/???? t?ۢ??ߺV9lIm?<?\??'~?͝?tf?Msk?`m?if-}5??":??=.\"??؅??5?B????:?9??? ??.?TؒP?7I???{?{?>?/??Y?c?=??ʚ?F????t?#O????[?Y$??3?r?a??'?Hp????%?A????*Ag?І????㖋ɟ3???tG=說~ʶh2     