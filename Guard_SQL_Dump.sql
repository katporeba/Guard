/*
 Navicat Premium Data Transfer

 Source Server         : guardtest
 Source Server Type    : PostgreSQL
 Source Server Version : 130005
 Source Host           : ec2-52-49-56-163.eu-west-1.compute.amazonaws.com:5432
 Source Catalog        : df0umg7sh18s90
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 130005
 File Encoding         : 65001

 Date: 31/01/2022 11:51:37
*/


-- ----------------------------
-- Sequence structure for Animal_id_Animal_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."Animal_id_Animal_seq";
CREATE SEQUENCE "public"."Animal_id_Animal_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for Animal_type_id_Animal_type_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."Animal_type_id_Animal_type_seq";
CREATE SEQUENCE "public"."Animal_type_id_Animal_type_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for Graph_id_Graph_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."Graph_id_Graph_seq";
CREATE SEQUENCE "public"."Graph_id_Graph_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for Project_id_Project_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."Project_id_Project_seq";
CREATE SEQUENCE "public"."Project_id_Project_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for Shelter_id_Shelter_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."Shelter_id_Shelter_seq";
CREATE SEQUENCE "public"."Shelter_id_Shelter_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Sequence structure for User_id_User_seq
-- ----------------------------
DROP SEQUENCE IF EXISTS "public"."User_id_User_seq";
CREATE SEQUENCE "public"."User_id_User_seq" 
INCREMENT 1
MINVALUE  1
MAXVALUE 2147483647
START 1
CACHE 1;

-- ----------------------------
-- Table structure for Animal
-- ----------------------------
DROP TABLE IF EXISTS "public"."Animal";
CREATE TABLE "public"."Animal" (
  "id_Animal" int4 NOT NULL DEFAULT nextval('"Animal_id_Animal_seq"'::regclass),
  "name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "age" int4 NOT NULL,
  "gender" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "size" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "health" varchar(255) COLLATE "pg_catalog"."default",
  "color" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "weight" float8 NOT NULL,
  "id_Graph" int4 NOT NULL,
  "id_Animal_type" int4 NOT NULL
)
;

-- ----------------------------
-- Records of Animal
-- ----------------------------
BEGIN;
INSERT INTO "public"."Animal" VALUES (29, 'Ryszard', 8, 'man', 'Mały/a', 'Wymaga leczenia', 'orange', 10.4, 7, 1);
INSERT INTO "public"."Animal" VALUES (30, 'Stefan', 8, 'man', 'Duży/a', 'Zdrowy/a', 'orange', 12, 8, 1);
INSERT INTO "public"."Animal" VALUES (31, 'Danuta', 3, 'woman', 'Średni/a', 'Zdrowy/a', 'orange', 5.5, 9, 1);
INSERT INTO "public"."Animal" VALUES (32, 'Grażyna', 4, 'woman', 'Mały/a', 'Zdrowy/a', 'brown', 4.8, 10, 1);
INSERT INTO "public"."Animal" VALUES (33, 'Salem', 8, 'man', 'Średni/a', 'Wymaga leczenia', 'white', 5.3, 11, 2);
INSERT INTO "public"."Animal" VALUES (34, 'Harold', 2, 'man', 'Mały/a', 'Zdrowy/a', 'white', 0.5, 12, 3);
INSERT INTO "public"."Animal" VALUES (35, 'Morus', 12, 'man', 'Średni/a', 'Zdrowy/a', 'black', 10.4, 13, 1);
COMMIT;

-- ----------------------------
-- Table structure for Animal_type
-- ----------------------------
DROP TABLE IF EXISTS "public"."Animal_type";
CREATE TABLE "public"."Animal_type" (
  "id_Animal_type" int4 NOT NULL DEFAULT nextval('"Animal_type_id_Animal_type_seq"'::regclass),
  "type_name" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of Animal_type
-- ----------------------------
BEGIN;
INSERT INTO "public"."Animal_type" VALUES (1, 'dog');
INSERT INTO "public"."Animal_type" VALUES (3, 'other');
INSERT INTO "public"."Animal_type" VALUES (2, 'cat');
COMMIT;

-- ----------------------------
-- Table structure for Favourites
-- ----------------------------
DROP TABLE IF EXISTS "public"."Favourites";
CREATE TABLE "public"."Favourites" (
  "id_Fav_User" int4 NOT NULL,
  "id_Project" int4 NOT NULL
)
;

-- ----------------------------
-- Records of Favourites
-- ----------------------------
BEGIN;
INSERT INTO "public"."Favourites" VALUES (23, 32);
INSERT INTO "public"."Favourites" VALUES (23, 30);
INSERT INTO "public"."Favourites" VALUES (23, 31);
INSERT INTO "public"."Favourites" VALUES (27, 31);
INSERT INTO "public"."Favourites" VALUES (27, 32);
INSERT INTO "public"."Favourites" VALUES (27, 30);
INSERT INTO "public"."Favourites" VALUES (27, 26);
COMMIT;

-- ----------------------------
-- Table structure for Graph
-- ----------------------------
DROP TABLE IF EXISTS "public"."Graph";
CREATE TABLE "public"."Graph" (
  "id_Graph" int4 NOT NULL DEFAULT nextval('"Graph_id_Graph_seq"'::regclass),
  "requires_attention" int4 NOT NULL,
  "accepts_children" int4 NOT NULL,
  "accepts_animals" int4 NOT NULL,
  "energy_level" int4 NOT NULL
)
;

-- ----------------------------
-- Records of Graph
-- ----------------------------
BEGIN;
INSERT INTO "public"."Graph" VALUES (7, 4, 1, 4, 3);
INSERT INTO "public"."Graph" VALUES (8, 3, 3, 1, 5);
INSERT INTO "public"."Graph" VALUES (9, 5, 3, 4, 5);
INSERT INTO "public"."Graph" VALUES (10, 3, 4, 1, 4);
INSERT INTO "public"."Graph" VALUES (11, 4, 3, 2, 5);
INSERT INTO "public"."Graph" VALUES (12, 3, 5, 2, 4);
INSERT INTO "public"."Graph" VALUES (13, 4, 5, 2, 3);
COMMIT;

-- ----------------------------
-- Table structure for Project
-- ----------------------------
DROP TABLE IF EXISTS "public"."Project";
CREATE TABLE "public"."Project" (
  "id_Project" int4 NOT NULL DEFAULT nextval('"Project_id_Project_seq"'::regclass),
  "title" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "description" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "id_Shelter" int4 NOT NULL,
  "id_Animal" int4 NOT NULL,
  "created_at" timestamp(6) NOT NULL,
  "photo" varchar(255) COLLATE "pg_catalog"."default" NOT NULL
)
;

-- ----------------------------
-- Records of Project
-- ----------------------------
BEGIN;
INSERT INTO "public"."Project" VALUES (28, 'Danuta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus ex at imperdiet venenatis. Aliquam quis condimentum ex. Praesent nec ligula vulputate mi ultricies ullamcorper non a nisl. Etiam sodales venenatis bibendum. ', 9, 31, '2022-01-30 12:08:45', 'celine-sayuri-tagami-2s6ORaJY6gI-unsplash.jpg');
INSERT INTO "public"."Project" VALUES (29, 'Grażyna', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus ex at imperdiet venenatis. Aliquam quis condimentum ex. Praesent nec ligula vulputate mi ultricies ullamcorper non a nisl. Etiam sodales venenatis bibendum. ', 11, 32, '2022-01-30 12:10:45', 'pauline-loroy-U3aF7hgUSrk-unsplash.jpg');
INSERT INTO "public"."Project" VALUES (30, 'Salem', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus ex at imperdiet venenatis. Aliquam quis condimentum ex. Praesent nec ligula vulputate mi ultricies ullamcorper non a nisl. Etiam sodales venenatis bibendum. ', 8, 33, '2022-01-30 12:13:54', 'hang-niu-Tn8DLxwuDMA-unsplash.jpg');
INSERT INTO "public"."Project" VALUES (31, 'Harold', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus ex at imperdiet venenatis. Aliquam quis condimentum ex. Praesent nec ligula vulputate mi ultricies ullamcorper non a nisl. Etiam sodales venenatis bibendum. ', 10, 34, '2022-01-30 12:15:04', 'kim-green-D_pXn7cueOs-unsplash.jpg');
INSERT INTO "public"."Project" VALUES (32, 'Morus', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus ex at imperdiet venenatis. Aliquam quis condimentum ex. Praesent nec ligula vulputate mi ultricies ullamcorper non a nisl. Etiam sodales venenatis bibendum. ', 8, 35, '2022-01-30 12:16:08', 'neil-fedorowycz-hHCDldR1ZcQ-unsplash.jpg');
INSERT INTO "public"."Project" VALUES (26, 'Ryszard', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus ex at imperdiet venenatis. Aliquam quis condimentum ex. Praesent nec ligula vulputate mi ultricies ullamcorper non a nisl. Etiam sodales venenatis bibendum. ', 10, 29, '2022-01-30 12:01:13', 'jamie-street-uNNCs5kL70Q-unsplash.jpg');
INSERT INTO "public"."Project" VALUES (27, 'Stefan', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec dapibus ex at imperdiet venenatis. Aliquam quis condimentum ex. Praesent nec ligula vulputate mi ultricies ullamcorper non a nisl. Etiam sodales venenatis bibendum. ', 9, 30, '2022-01-30 12:06:35', 'undine-tackmann-8mxSINYFoSw-unsplash.jpg');
COMMIT;

-- ----------------------------
-- Table structure for Shelter
-- ----------------------------
DROP TABLE IF EXISTS "public"."Shelter";
CREATE TABLE "public"."Shelter" (
  "id_Shelter" int4 NOT NULL DEFAULT nextval('"Shelter_id_Shelter_seq"'::regclass),
  "phone_number" int4 NOT NULL,
  "city" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "street" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "street_number" varchar(100) COLLATE "pg_catalog"."default" NOT NULL,
  "postal_code" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "website" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "id_User" int4
)
;

-- ----------------------------
-- Records of Shelter
-- ----------------------------
BEGIN;
INSERT INTO "public"."Shelter" VALUES (8, 654983256, 'Kraków', 'Rybna', '3', '30-254', 'schronisko-krakow.pl', 23);
INSERT INTO "public"."Shelter" VALUES (9, 654876946, 'Grybów', 'Parkowa', '10', '33-330', 'schronisko-grybow.pl', 24);
INSERT INTO "public"."Shelter" VALUES (10, 895764098, 'Nowy Sącz', 'Tłoki', '24D', '33-300', 'schronisko-nowysacz.pl', 25);
INSERT INTO "public"."Shelter" VALUES (11, 476856745, 'Wielogłowy', 'Wielogłowy', '350', '33-311', 'schronisko-wieloglowy.pl', 26);
COMMIT;

-- ----------------------------
-- Table structure for User
-- ----------------------------
DROP TABLE IF EXISTS "public"."User";
CREATE TABLE "public"."User" (
  "id_User" int4 NOT NULL DEFAULT nextval('"User_id_User_seq"'::regclass),
  "email" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "password" varchar(255) COLLATE "pg_catalog"."default" NOT NULL,
  "logged_in" bool NOT NULL DEFAULT false
)
;

-- ----------------------------
-- Records of User
-- ----------------------------
BEGIN;
INSERT INTO "public"."User" VALUES (28, 'osoba2@gmail.com', '$2y$10$EuxR.OPeaGQjROf5dOdT../lWZXhbFCIlgYqu8owqa2Pdi7P58lEW', 'f');
INSERT INTO "public"."User" VALUES (24, 'grybow@gmail.com', '$2y$10$5gc10XfylCvNVX01lrvxX.OnpQjDAV3hYcaZSqZ83GT7w3GxhfWFG', 'f');
INSERT INTO "public"."User" VALUES (26, 'wieloglowy@gmail.com', '$2y$10$QuHdY3/3zM/jiM0JKkpG4eay6lrKE57lVN9F4VGlyxEOX3UaKp6WG', 'f');
INSERT INTO "public"."User" VALUES (25, 'nowysacz@gmail.com', '$2y$10$bTOeiv00dhqj5wmgrW/UW.pD51ts5zjMx6SHxXxBeO5StpW0R0ipS', 'f');
INSERT INTO "public"."User" VALUES (23, 'krakow@gmail.com', '$2y$10$YY69lmUu75blF91qDjHnxeojQPiphZhhHcXnbVg2cRMZ1dsdzJJcK', 'f');
INSERT INTO "public"."User" VALUES (27, 'osoba1@gmail.com', '$2y$10$jdm/QAIbSeQZaz.q04Qjz.G/o7xj/Wn/DNiTTEYuX.M2Cu88rt4mq', 't');
COMMIT;

-- ----------------------------
-- View structure for Projects_Desc
-- ----------------------------
DROP VIEW IF EXISTS "public"."Projects_Desc";
CREATE VIEW "public"."Projects_Desc" AS  SELECT "Animal"."id_Graph",
    "Animal"."id_Animal_type",
    "Shelter"."id_User",
    "Project"."id_Shelter",
    "Project"."id_Animal",
    "Project"."id_Project",
    "Project".title,
    "Project".description,
    "Project".created_at,
    "Project".photo,
    "Animal".name,
    "Animal".age,
    "Animal".gender,
    "Animal".size,
    "Animal".health,
    "Animal".color,
    "Animal".weight,
    "Shelter".phone_number,
    "Shelter".city,
    "Shelter".street,
    "Shelter".street_number,
    "Shelter".postal_code,
    "Shelter".website,
    "User".email,
    "User".password,
    "User".logged_in,
    "Animal_type".type_name,
    "Graph".requires_attention,
    "Graph".accepts_children,
    "Graph".accepts_animals,
    "Graph".energy_level
   FROM "Project"
     JOIN "Animal" USING ("id_Animal")
     JOIN "Shelter" USING ("id_Shelter")
     JOIN "User" USING ("id_User")
     JOIN "Animal_type" USING ("id_Animal_type")
     JOIN "Graph" USING ("id_Graph")
  ORDER BY "Project".created_at DESC;

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."Animal_id_Animal_seq"
OWNED BY "public"."Animal"."id_Animal";
SELECT setval('"public"."Animal_id_Animal_seq"', 36, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."Animal_type_id_Animal_type_seq"
OWNED BY "public"."Animal_type"."id_Animal_type";
SELECT setval('"public"."Animal_type_id_Animal_type_seq"', 4, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."Graph_id_Graph_seq"
OWNED BY "public"."Graph"."id_Graph";
SELECT setval('"public"."Graph_id_Graph_seq"', 14, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."Project_id_Project_seq"
OWNED BY "public"."Project"."id_Project";
SELECT setval('"public"."Project_id_Project_seq"', 33, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."Shelter_id_Shelter_seq"
OWNED BY "public"."Shelter"."id_Shelter";
SELECT setval('"public"."Shelter_id_Shelter_seq"', 12, true);

-- ----------------------------
-- Alter sequences owned by
-- ----------------------------
ALTER SEQUENCE "public"."User_id_User_seq"
OWNED BY "public"."User"."id_User";
SELECT setval('"public"."User_id_User_seq"', 29, true);

-- ----------------------------
-- Indexes structure for table Animal
-- ----------------------------
CREATE UNIQUE INDEX "animal_id_animal_uindex" ON "public"."Animal" USING btree (
  "id_Animal" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table Animal
-- ----------------------------
ALTER TABLE "public"."Animal" ADD CONSTRAINT "animal_pk" PRIMARY KEY ("id_Animal");

-- ----------------------------
-- Indexes structure for table Animal_type
-- ----------------------------
CREATE UNIQUE INDEX "animal_type_id_animal_type_uindex" ON "public"."Animal_type" USING btree (
  "id_Animal_type" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table Animal_type
-- ----------------------------
ALTER TABLE "public"."Animal_type" ADD CONSTRAINT "animal_type_pk" PRIMARY KEY ("id_Animal_type");

-- ----------------------------
-- Indexes structure for table Graph
-- ----------------------------
CREATE UNIQUE INDEX "graph_id_graph_uindex" ON "public"."Graph" USING btree (
  "id_Graph" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table Graph
-- ----------------------------
ALTER TABLE "public"."Graph" ADD CONSTRAINT "graph_pk" PRIMARY KEY ("id_Graph");

-- ----------------------------
-- Indexes structure for table Project
-- ----------------------------
CREATE UNIQUE INDEX "project_id_project_uindex" ON "public"."Project" USING btree (
  "id_Project" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table Project
-- ----------------------------
ALTER TABLE "public"."Project" ADD CONSTRAINT "project_pk" PRIMARY KEY ("id_Project");

-- ----------------------------
-- Indexes structure for table Shelter
-- ----------------------------
CREATE UNIQUE INDEX "shelter_id_shelter_uindex" ON "public"."Shelter" USING btree (
  "id_Shelter" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table Shelter
-- ----------------------------
ALTER TABLE "public"."Shelter" ADD CONSTRAINT "shelter_pk" PRIMARY KEY ("id_Shelter");

-- ----------------------------
-- Indexes structure for table User
-- ----------------------------
CREATE UNIQUE INDEX "user_email_uindex" ON "public"."User" USING btree (
  "email" COLLATE "pg_catalog"."default" "pg_catalog"."text_ops" ASC NULLS LAST
);
CREATE UNIQUE INDEX "user_id_user_uindex" ON "public"."User" USING btree (
  "id_User" "pg_catalog"."int4_ops" ASC NULLS LAST
);

-- ----------------------------
-- Primary Key structure for table User
-- ----------------------------
ALTER TABLE "public"."User" ADD CONSTRAINT "user_pk" PRIMARY KEY ("id_User");

-- ----------------------------
-- Foreign Keys structure for table Animal
-- ----------------------------
ALTER TABLE "public"."Animal" ADD CONSTRAINT "animal_animal_type_id_animal_type_fk" FOREIGN KEY ("id_Animal_type") REFERENCES "public"."Animal_type" ("id_Animal_type") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."Animal" ADD CONSTRAINT "animal_graph_id_graph_fk" FOREIGN KEY ("id_Graph") REFERENCES "public"."Graph" ("id_Graph") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table Favourites
-- ----------------------------
ALTER TABLE "public"."Favourites" ADD CONSTRAINT "favourites_project_id_project_fk" FOREIGN KEY ("id_Project") REFERENCES "public"."Project" ("id_Project") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."Favourites" ADD CONSTRAINT "favourites_user_id_user_fk" FOREIGN KEY ("id_Fav_User") REFERENCES "public"."User" ("id_User") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table Project
-- ----------------------------
ALTER TABLE "public"."Project" ADD CONSTRAINT "project_animal_id_animal_fk" FOREIGN KEY ("id_Animal") REFERENCES "public"."Animal" ("id_Animal") ON DELETE CASCADE ON UPDATE CASCADE;
ALTER TABLE "public"."Project" ADD CONSTRAINT "project_shelter_id_shelter_fk" FOREIGN KEY ("id_Shelter") REFERENCES "public"."Shelter" ("id_Shelter") ON DELETE CASCADE ON UPDATE CASCADE;

-- ----------------------------
-- Foreign Keys structure for table Shelter
-- ----------------------------
ALTER TABLE "public"."Shelter" ADD CONSTRAINT "shelter_user_id_user_fk" FOREIGN KEY ("id_User") REFERENCES "public"."User" ("id_User") ON DELETE CASCADE ON UPDATE CASCADE;
