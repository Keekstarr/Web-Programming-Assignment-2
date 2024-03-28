CREATE DATABASE books;
GRANT USAGE ON *.* TO 'group16'@'localhost' IDENTIFIED BY 'password';
GRANT ALL PRIVILEGES ON books.* TO 'group16'@'localhost';
FLUSH PRIVILEGES;

USE books;

CREATE TABLE IF NOT EXISTS `book` (
    `book_id` INT AUTO_INCREMENT PRIMARY KEY,
    `title` VARCHAR(255) NOT NULL,
    `author` VARCHAR(255) NOT NULL,
    `publisher` VARCHAR(255),
    `year` INT,
    `edition` VARCHAR(50),
    `genre` VARCHAR(100),
    `description` TEXT,
    `rating` DECIMAL(3,1),
    `review` TEXT,
    `image` VARCHAR(255)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1;

INSERT INTO `book` (`title`, `author`, `publisher`, `year`, `edition`, `genre`, `description`, `rating`, `review`) VALUES 
('The Great Gatsby', 'F. Scott Fitzgerald', 'Scribner', 1925, 'First edition', 'Fiction', 'The Great Gatsby is a novel written by American author F. Scott Fitzgerald that follows a cast of characters living in the fictional towns of West Egg and East Egg on prosperous Long Island in the summer of 1922.', 4.5, 'A masterpiece of American literature.'),
('To Kill a Mockingbird', 'Harper Lee', 'J.B. Lippincott & Co.', 1960, 'First edition', 'Fiction', 'To Kill a Mockingbird is a novel by Harper Lee published in 1960. It was immediately successful, winning the Pulitzer Prize, and has become a classic of modern American literature.', 4.8, 'A timeless classic with profound themes.'),
('The Catcher in the Rye', 'J.D. Salinger', 'Little, Brown and Company', 1951, 'First edition', 'Coming-of-age fiction', 'The Catcher in the Rye is a novel by J. D. Salinger. First published in the United States in 1951, the novel presents a narrative of a young man''s experiences in New York City in the early 1950s.', 4.2, 'An influential coming-of-age novel.'),
('To the Lighthouse', 'Virginia Woolf', 'Hogarth Press', 1927, 'First edition', 'Modernist literature', 'To the Lighthouse is a novel by Virginia Woolf. The novel centres on the Ramsay family and their visits to the Isle of Skye in Scotland between 1910 and 1920.', 4.0, 'A landmark of modernist literature.'),
('Brave New World', 'Aldous Huxley', 'Chatto & Windus', 1932, 'First edition', 'Science fiction', 'Brave New World is a dystopian social science fiction novel by Aldous Huxley. Published in 1932, it propounds that economic chaos and unemployment will cause a radical reaction in the form of an international scientific empire that manufactures its citizens in the laboratory on a eugenic basis, without the need for human intercourse.', 4.3, 'A thought-provoking dystopian vision.'),
('The Lord of the Rings', 'J.R.R. Tolkien', 'George Allen & Unwin', 1954, 'First edition', 'High fantasy', 'The Lord of the Rings is an epic high-fantasy novel by J. R. R. Tolkien. It was published in three volumes over the course of a year from 29 July 1954 to 20 October 1955.', 4.9, 'The pinnacle of fantasy literature.'),
('Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 'Bloomsbury Publishing', 1997, 'First edition', 'Fantasy', 'Harry Potter and the Philosopher\'s Stone is a fantasy novel written by British author J.K. Rowling. It is the first novel in the Harry Potter series and Rowling\'s debut novel.', 4.7, 'The beginning of a magical journey.');