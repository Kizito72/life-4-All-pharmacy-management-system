-- Increase password column length to accommodate hashed passwords
ALTER TABLE users MODIFY COLUMN password VARCHAR(255);
