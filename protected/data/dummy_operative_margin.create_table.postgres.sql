CREATE TABLE dummy_operative_margin
(
  id integer NOT NULL,
  area character varying(255),
  margin double precision,
  scenario character varying(100),
  CONSTRAINT dummy_operative_margin_pkey PRIMARY KEY (id )
)
WITH (
  OIDS=FALSE
);
ALTER TABLE dummy_operative_margin
  OWNER TO postgres;