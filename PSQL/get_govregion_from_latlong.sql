select gid, region from sagovtregions where st_within(ST_GeomFromEWKT('SRID=4326; POINT(138.5887884 -34.9220317 )'),geom);