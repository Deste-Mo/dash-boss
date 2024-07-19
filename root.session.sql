-- INSERT INTO tache (tache_nom) VALUES ('Préparer le rapport financier');
-- INSERT INTO tache (tache_nom) VALUES ('Organiser la réunion d\'équipe');
-- INSERT INTO tache (tache_nom) VALUES ('Mettre à jour le site web');
-- INSERT INTO tache (tache_nom) VALUES ('Répondre aux emails des clients');
-- INSERT INTO tache (tache_nom) VALUES ('Planifier la campagne marketing');
-- INSERT INTO tache (tache_nom) VALUES ('Analyser les données de vente');
-- INSERT INTO tache (tache_nom) VALUES ('Rédiger le communiqué de presse');
-- INSERT INTO tache (tache_nom) VALUES ('Superviser le projet de développement');
-- INSERT INTO tache (tache_nom) VALUES ('Effectuer la maintenance du serveur');
-- INSERT INTO tache (tache_nom) VALUES ('Former les nouveaux employés');


-- SELECT * FROM tache;

-- SELECT tache.*, DATE(tache.dateDeb) as dateCom ,personnel.nom,personnel.prenom FROM tache LEFT JOIN personnel on  tache.cin = personnel.cin WHERE etat = 'N' OR etat = 'E'

-- UPDATE tache SET etat = 'N', cin = Null, dateDeb = Null, duree = (duree - ) WHERE tache_id = ?

SELECT COUNT(tache_id) AS 'tout' FROM tache WHERE id_projet = 4