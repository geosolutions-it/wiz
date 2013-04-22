CREATE TABLE dummy_service_areas_operative_margin
(
  id integer NOT NULL,
  area character varying(254),
  margin double precision,
  scenario double precision,
  CONSTRAINT dummy_service_areas_operative_margin_pkey PRIMARY KEY (id )
)
WITH (
  OIDS=FALSE
);
ALTER TABLE dummy_service_areas_operative_margin
  OWNER TO postgres;