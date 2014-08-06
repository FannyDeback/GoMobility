ALTER TABLE comments ADD id_eco_actors int;
ALTER TABLE comments ADD CONSTRAINT FOREIGN KEY (id_eco_actors) REFERENCES eco_actors(id);