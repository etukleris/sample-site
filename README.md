# sample-site
Sample website for learning purposes. Used xampp stack (apache, mysql) as a platform. 
Started with notes from freecodecamp tutorials and kept adding some of my own pieces.
Site still uses mostly static pages. 
Usage: simply put the folder to ../xampp/htdocs folder. Run xampp stack. Site accessible through localhost/freecodecamp/pages/index.php .
Currently one table used to keep data (based on export info):
--------------------------------------
-- Database: `freecodecampdata`
-- Table structure for table `pictures`
--

CREATE TABLE `pictures` (
  `id` int(11) NOT NULL,
  `dateadded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `useradded` varchar(100) DEFAULT NULL,
  `imagename` varchar(100) DEFAULT NULL,
  `cattype` varchar(100) DEFAULT NULL,
  `catcharacteristics` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
--------------------------------------

There are still plenty of work to be done, noticeable additions include: 
-> rework/move the whole project to a framework (would likely improve code usability, site security and other);
-> user creation/authentication (which would mean more tables in the DB);
-> more TBD;
