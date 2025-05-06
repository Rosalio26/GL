
USE interless;

CREATE TABLE  register_gch (
	user_hw_id INT PRIMARY KEY AUTO_INCREMENT, 
	personalname_hw VARCHAR(100) NOT NULL,
	username_hw VARCHAR(50) NOT NULL UNIQUE,
	email_hw VARCHAR(80) NOT NULL UNIQUE,
	password_hw VARCHAR(100) NOT NULL,
	numberaccess_hw INT(10) NOT NULL UNIQUE
);