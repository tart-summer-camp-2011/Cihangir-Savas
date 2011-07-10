

CREATE TABLE "TartIMDBSchema"."Award"
(
  "AwardID" integer NOT NULL,
  "OrganizationID" integer NOT NULL,
  "Title" character varying(30),
  "Year" date,
  CONSTRAINT "Award_pkey" PRIMARY KEY ("AwardID"),
  CONSTRAINT "Award_fkey" FOREIGN KEY ("OrganizationID") REFERENCES "Organization" ("OrganizationID");
)


CREATE TABLE "TartIMDBSchema"."Cast"
(
  "PeopleID" integer NOT NULL,
  "RoleName" character varying(30),
   CONSTRAINT "Cast_pkey" PRIMARY KEY ("PeopleID"),
   CONSTRAINT "Cast_fkey" FOREIGN KEY ("PeopleID") REFERENCES "People" ("PeopleID");
)


CREATE TABLE "TartIMDBSchema"."Cinema"
(
  "CinemaID" integer NOT NULL,
  "CityID" integer  NOT NULL,
  "Name" character varying(50),
  "Country" character varying(35),
  "PhoneNumber" integer,
  "Website" character varying(35),
  "NumberofScreen" integer,
  "Street" character varying(35),
   CONSTRAINT "Cinema_pkey" PRIMARY KEY ("CinemaID"),
   CONSTRAINT "Cinema_fkey" FOREIGN KEY ("CityID") REFERENCES "City" ("CityID");
)

CREATE TABLE "TartIMDBSchema"."City"
(
  "CityID" integer NOT NULL,
  "Name" character varying(35),
  "State" character varying(35),
  "Country" character varying(35),
  CONSTRAINT "City_pkey" PRIMARY KEY ("CityID");
)


CREATE TABLE "TartIMDBSchema"."Crew"
(
  "PeopleID" integer,
  "JobTitle" character varying(30),
  CONSTRAINT "Crew_pkey" PRIMARY KEY ("PeopleID"),
  CONSTRAINT "Crew_fkey" FOREIGN KEY ("PeopleID") REFERENCES "People" ("PeopleID");
)


CREATE TABLE "TartIMDBSchema"."Genre"
(
  "GenreID" integer,
  "Type" character varying(30),
  CONSTRAINT "Genre_pkey" PRIMARY KEY ("GenreID");
)


CREATE TABLE "TartIMDBSchema"."Movie"
(
  "MovieID" integer NOT NULL,
  "GenreID" character varying(30) NOT NULL,
  "TagLine" character varying(250),
  "StreetName" character varying(35),
  "YearMade" integer,
  "Country" character varying(35),
  "Website" character varying(35),
  "Language" character varying(20),
  "Colour" bit(1),
  "Rating" character varying(2),
  "Ranking" integer,
  "RunningTime" integer,
  "ShowingStartDate" timestamp with time zone,
  CONSTRAINT "Movie_pkey" PRIMARY KEY ("MovieID"),
  CONSTRAINT "Movie_fkey" FOREIGN KEY ("GenreID") REFERENCES "Genre" ("GenreId");
)


CREATE TABLE "TartIMDBSchema"."MovieCinema"
(
  "MovieID" integer NOT NULL,
  "CinemaID" integer NOT NULL,
  CONSTRAINT "MovieCinema1_pkey" PRIMARY KEY ("MovieID")
  CONSTRAINT "MovieCinema1_fkey" FOREIGN KEY ("MovieID") REFERENCES "Movie" ("MovieID"),
  CONSTRAINT "MovieCinema2_pkey" PRIMARY KEY ("CinemaID"),
  CONSTRAINT "MovieCinema2_fkey" FOREIGN KEY ("CinemaID") REFERENCES "Cinema" ("CinemaID");
)


CREATE TABLE "TartIMDBSchema"."MoviePeople"
(
  "MovieID" integer NOT NULL,
  "PeopleID" integer NOT NULL,
  CONSTRAINT "MoviePeople1_pkey" PRIMARY KEY ("MovieID"),
  CONSTRAINT "MoviePeople2_pkey" PRIMARY KEY ("PeopleID"),
  CONSTRAINT "MoviePeople1_fkey" FOREIGN KEY ("MovieID") REFERENCES "Movie" ("MovieID");
  CONSTRAINT "MoviePeople2_fkey" FOREIGN KEY ("PeopleID") REFERENCES "People" ("PeopleID");
)


CREATE TABLE "TartIMDBSchema"."MovieProduce"
(
  "StudioID" integer NOT NULL,
  "MovieID" integer NOT NULL,
  CONSTRAINT "MovieProduce1_pkey" PRIMARY KEY ("StudioID"),
  CONSTRAINT "MovieProduce2_pkey" PRIMARY KEY ("MovieID"),
  CONSTRAINT "MovieProduce1_fkey" FOREIGN KEY ("StudioID") REFERENCES "Studio" ("StudioID");
  CONSTRAINT "MovieProduce2_fkey" FOREIGN KEY ("MovieID") REFERENCES "Movie" ("MovieID");
)


CREATE TABLE "TartIMDBSchema"."Nominee"
(
  "AwardID" integer NOT NULL,
  "MovieID" integer NOT NULL,
  "PeopleID" integer NOT NULL,
   CONSTRAINT "Nominee1_pkey" PRIMARY KEY ("AwardID"),
   CONSTRAINT "Nominee1_fkey" FOREIGN KEY ("AwardID") REFERENCES "Award" ("AwardID"),
   CONSTRAINT "Nominee2_pkey" PRIMARY KEY ("MovieID"),
   CONSTRAINT "Nominee2_fkey" FOREIGN KEY ("MovieID") REFERENCES "Movie" ("MovieID"),
   CONSTRAINT "Nominee3_pkey" PRIMARY KEY ("PeopleID"),
   CONSTRAINT "Nominee3_fkey" FOREIGN KEY ("PeopleID") REFERENCES "People" ("PeopleID");
)


CREATE TABLE "TartIMDBSchema"."Organization"
(
  "OrganizationID" integer NOT NULL,
  "Name" character varying(50),
  "Country" character varying,
   CONSTRAINT "Organization_pkey" PRIMARY KEY ("OrganizationID");
)


CREATE TABLE "TartIMDBSchema"."People"
(
  "PeopleID" integer NOT NULL,
  "Title" character varying(35),
  "FamilyName" character varying(20),
  "GivenName" character varying(35),
  "Gender" character varying(1),
  "Website" character varying(35),
  "Email" character varying(50),
  "DateofBirth" date,
  "CityofBirth" character varying(35),
  "CountryofBirth" character varying(35),
  CONSTRAINT "People_pkey" PRIMARY KEY ("PeopleID"),
)


CREATE TABLE "TartIMDBSchema"."Studio"
(
  "StudioID" integer NOT NULL,
  "StudioName" character varying(30),
  "YearEstablished" date,
  "YearClosed" date,
  "Country" character varying(35),
  CONSTRAINT "Studio_pkey" PRIMARY KEY ("StudioID");
)
