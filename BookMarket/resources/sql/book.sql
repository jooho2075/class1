/* phpmyadmin에서 table을 만드는 쿼리 */
USE bookmarketdb; /* class1 DB를 사용하겠다는 의미 */

CREATE TABLE IF NOT EXISTS book(
	b_id VARCHAR(10) NOT NULL,
	b_name VARCHAR(20),
	b_unitPrice  INTEGER,
	b_author VARCHAR(20),
	b_description TEXT,	
   	b_category VARCHAR(20),	
	b_unitsInStock INTEGER,
	b_releaseDate   VARCHAR(20),
	b_condition VARCHAR(20),
	b_fileName  VARCHAR(20),
	PRIMARY KEY (b_id)
)default CHARSET=utf8;

desc book; /* book 정보를 보여달라는 의미 */