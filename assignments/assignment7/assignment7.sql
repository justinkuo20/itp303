-- PART 1

-- 1. Display albums that have the letters “on” somewhere in the album title. Sort results in alphabetical order by album title.
SELECT *
FROM albums
WHERE title LIKE '%on%'
ORDER BY title ASC;

-- 2. Same as #1, but only show album title and artist name (no artist_id) columns.
SELECT title, name
FROM albums
JOIN artists
	ON albums.artist_id = artists.artist_id
WHERE title LIKE '%on%'
ORDER BY title ASC;

-- 3. Display tracks that have AAC audio file format. 
-- Only show track name (alias: track_name), composer, media type name (alias: media_type), and unit price columns.
SELECT tracks.name AS track_name, composer, media_types.name AS media_type, unit_price
FROM tracks
JOIN media_types
	ON media_types.media_type_id = tracks.media_type_id
WHERE media_types.media_type_id = 5;

-- 4. Display R&B/Soul and Jazz tracks that have a composer (not NULL). Sort results in reverse-alphabetical order by track name. 
-- Only show track ID, track name (track_name), composer, milliseconds, and genre name (genre_name) columns.
SELECT track_id, tracks.name AS track_name, composer, milliseconds, genres.name AS genre_name
FROM tracks
JOIN genres
	ON genres.genre_id = tracks.genre_id
WHERE ((genres.genre_id = 2) OR (genres.genre_id = 14)) AND composer IS NOT NULL
ORDER BY tracks.name DESC;

-- PART 2

SELECT * FROM dvd_titles;

-- 1. Display drama (genre) DVDs that won awards. Sort results by year of when the DVD won an award. Show dvd title, award, genre, label, and rating.
SELECT title, award, genres.genre, labels.label, ratings.rating
FROM dvd_titles
JOIN genres
	ON dvd_titles.genre_id = genres.genre_id
JOIN labels
	ON dvd_titles.label_id = labels.label_id
JOIN ratings
	ON dvd_titles.rating_id = ratings.rating_id
WHERE (award IS NOT NULL) AND (genres.genre_id = 9)
ORDER BY award ASC;

-- 2. Display DVDs made by Universal (a label) and have DTS sound. Show dvd title, sound, label, genre, and rating.
SELECT title, sounds.sound, labels.label, genres.genre, ratings.rating
FROM dvd_titles
JOIN sounds
	ON dvd_titles.sound_id = sounds.sound_id
JOIN labels
	ON dvd_titles.label_id = labels.label_id
JOIN genres
	ON dvd_titles.genre_id = genres.genre_id
JOIN ratings
	ON dvd_titles.rating_id = ratings.rating_id
WHERE (sounds.sound_id = 4) AND (labels.label_id = 127);

-- 3. Display R-rated Sci-Fi DVDs that have a release date (not NULL). 
-- Order results from newest to oldest released DVD. Show dvd title, release date, rating, genre, sound, and label.
SELECT title, release_date, ratings.rating, genres.genre, sounds.sound, labels.label
FROM dvd_titles
JOIN sounds
	ON dvd_titles.sound_id = sounds.sound_id
JOIN labels
	ON dvd_titles.label_id = labels.label_id
JOIN genres
	ON dvd_titles.genre_id = genres.genre_id
JOIN ratings
	ON dvd_titles.rating_id = ratings.rating_id
WHERE (ratings.rating_id = 7) AND (genres.genre_id = 19) AND (release_date IS NOT NULL)
ORDER BY release_date DESC;

-- PART 3

-- 2. Create a view mpeg_tracks that displays all tracks with MPEG audio file format. 
-- Display track name (track_name) artist name (artist_name), composer, album title (album_title), and media type (media_type). Sort results in alphabetical order by track name.
CREATE VIEW mpeg_tracks AS
SELECT tracks.name AS track_name, artists.name AS artist_name, composer, albums.title AS album_title, media_types.name AS media_type
FROM tracks
JOIN albums
	ON tracks.album_id = albums.album_id
JOIN artists
	ON albums.artist_id = artists.artist_id
JOIN media_types
	ON tracks.media_type_id = media_types.media_type_id
WHERE media_types.media_type_id = 1
ORDER BY tracks.name ASC;

 -- 3. Add a track below to the database
 
 -- add album first
 INSERT INTO albums (title, artist_id)
 VALUES ('The Song Remains The Same (Disc 1)', 22);
 
 -- add track into album that was just created
 INSERT INTO tracks(name, album_id, media_type_id, genre_id, composer, milliseconds, bytes, unit_price)
 VALUES ('The Ocean', 353, 1, 1, 'John Bonham/John Paul Jones/Robert Plant', '248000', '7990000', '1.99');
 
 -- 4. Make the following changes to the track added above:
 UPDATE tracks
 SET bytes = '8998765', unit_price = '1.99'
 WHERE track_id = 3504;
 
 -- 5. Delete track name “20 Flight Rock” by BackBeat from the database
 -- look for track
 SELECT * FROM tracks
 WHERE name LIKE '20 Flight Rock';
 
 -- delete track
 DELETE FROM tracks
 WHERE track_id = 122;
 
 -- look in playlist_track for reference to the track
 SELECT * FROM playlist_track
 WHERE track_id = 122;
 
 -- delete reference to the track inside playlist_track
 DELETE FROM playlist_track
 WHERE track_id = 122;
 
 
-- 6.Display how many tracks there are for each album. Show album ID, album title (album_title), and track count (track_count).
SELECT albums.album_id, title, COUNT(*) AS track_count
FROM albums
JOIN tracks
	ON tracks.album_id = albums.album_id
GROUP BY title;