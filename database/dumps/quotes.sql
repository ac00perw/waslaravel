SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;


CREATE TABLE IF NOT EXISTS `quotes` (
  `id` int(11) NOT NULL,
  `quote` text NOT NULL,
  `author` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=51 DEFAULT CHARSET=latin1;

INSERT INTO `quotes` VALUES(2, 'In 2010, almost 49 million people\r\nlived in food-insecure households in the United States out of a total population of 304 million. Food insecure households are de?ned as having dif?culty providing enough food for all of their members at some time during the year due to a lack of resources.', 'Hyman/Buzby');
INSERT INTO `quotes` VALUES(3, 'The sun, the moon and the stars would have disappeared long ago... had they happened to be within the reach of predatory human hands.  ', 'Havelock Ellis, The Dance of Life, 1923');
INSERT INTO `quotes` VALUES(4, 'There is a sufficiency in the world for man''s need but not for man''s greed.  ', 'Mohandas K. Gandhi');
INSERT INTO `quotes` VALUES(5, 'There''s so much pollution in the air now that if it weren''t for our lungs there''d be no place to put it all.  ', 'Robert Orben');
INSERT INTO `quotes` VALUES(6, 'It wasn''t the Exxon Valdez captain''s driving that caused the Alaskan oil spill.  It was yours.  ', 'Greenpeace advertisement, New York Times, 25 February 1990');
INSERT INTO `quotes` VALUES(7, 'In America today you can murder land for private profit.  You can leave the corpse for all to see, and nobody calls the cops.  ', 'Paul Brooks, The Pursuit of Wilderness, 1971');
INSERT INTO `quotes` VALUES(8, 'Don''t blow it - good planets are hard to find.  ', 'Quoted in Time');
INSERT INTO `quotes` VALUES(9, 'Nature provides a free lunch, but only if we control our appetites.  ', 'William Ruckelshaus, Business Week, 18 June 1990');
INSERT INTO `quotes` VALUES(10, 'When a man throws an empty cigarette package from an automobile, he is liable to a fine of $50.  When a man throws a billboard across a view, he is richly rewarded.  ', 'Pat Brown, quoted in David Ogilvy, Ogilvy on Advertising, 1985');
INSERT INTO `quotes` VALUES(11, 'Because we don''t think about future generations, they will never forget us.  ', 'Henrik Tikkanen');
INSERT INTO `quotes` VALUES(12, 'I''m not an environmentalist.  I''m an Earth warrior.  ', 'Darryl Cherney, quoted in Smithsonian, April 1990');
INSERT INTO `quotes` VALUES(13, 'I think the environment should be put in the category of our national security.  Defense of our resources is just as important as defense abroad.  Otherwise what is there to defend?  ', 'Robert Redford, Yosemite National Park dedication, 1985');
INSERT INTO `quotes` VALUES(14, 'We never know the worth of water till the well is dry.  ', 'Thomas Fuller, Gnomologia, 1732');
INSERT INTO `quotes` VALUES(15, 'Your grandchildren will likely find it incredible - or even sinful - that you burned up a gallon of gasoline to fetch a pack of cigarettes!  ', 'Paul MacCready, Jr.');
INSERT INTO `quotes` VALUES(16, 'We do not inherit the earth from our ancestors, we borrow it from our children.  ', 'Native American Proverb');
INSERT INTO `quotes` VALUES(17, 'There are no passengers on Spaceship Earth.  We are all crew.  ', 'Marshall McLuhan, 1964');
INSERT INTO `quotes` VALUES(18, 'They kill good trees to put out bad newspapers.  ', 'James G. Watt, quoted in Newsweek, 8 March 1982');
INSERT INTO `quotes` VALUES(19, 'I have no doubt that we will be successful in harnessing the sun''s energy.... If sunbeams were weapons of war, we would have had solar energy centuries ago.  ', 'Sir George Porter, quoted in The Observer, 26 August 1973');
INSERT INTO `quotes` VALUES(20, 'The use of solar energy has not been opened up because the oil industry does not own the sun.  ', 'Ralph Nader, quoted in Linda Botts, ed., Loose Talk, 1980');
INSERT INTO `quotes` VALUES(21, 'We abuse land because we regard it as a commodity belonging to us.  When we see land as a community to which we belong, we may begin to use it with love and respect.  ', 'Aldo Leopold, A Sand County Almanac');
INSERT INTO `quotes` VALUES(22, 'The earth we abuse and the living things we kill will, in the end, take their revenge; for in exploiting their presence we are diminishing our future.  ', 'Marya Mannes, More in Anger, 1958');
INSERT INTO `quotes` VALUES(23, 'They kill good trees to put out bad newspapers.  ', 'James G. Watt, quoted in Newsweek, 8 March 1982');
INSERT INTO `quotes` VALUES(24, 'I have no doubt that we will be successful in harnessing the sun''s energy.... If sunbeams were weapons of war, we would have had solar energy centuries ago.  ', 'Sir George Porter, quoted in The Observer, 26 August 1973');
INSERT INTO `quotes` VALUES(25, 'We abuse land because we regard it as a commodity belonging to us.  When we see land as a community to which we belong, we may begin to use it with love and respect.  ', 'Aldo Leopold, A Sand County Almanac');
INSERT INTO `quotes` VALUES(26, 'The earth we abuse and the living things we kill will, in the end, take their revenge; for in exploiting their presence we are diminishing our future.  ', 'Marya Mannes, More in Anger, 1958');
INSERT INTO `quotes` VALUES(27, 'The packaging for a microwavable ''microwave'' dinner is programmed for a shelf life of maybe six months, a cook time of two minutes and a landfill dead-time of centuries.  ', 'David Wann, Buzzworm, November 1990');
INSERT INTO `quotes` VALUES(28, 'So bleak is the picture... that the bulldozer and not the atomic bomb may turn out to be the most destructive invention of the 20th century.  ', 'Philip Shabecoff, New York Times Magazine, 4 June 1978');
INSERT INTO `quotes` VALUES(29, 'And Man created the plastic bag and the tin and aluminum can and the cellophane wrapper and the paper plate, and this was good because Man could then take his automobile and buy all his food in one place and He could save that which was good to eat in the refrigerator and throw away that which had no further use.  And soon the earth was covered with plastic bags and aluminum cans and paper plates and disposable bottles and there was nowhere to sit down or walk, and Man shook his head and cried:  ''Look at this Godawful mess.'' ', 'Art Buchwald, 1970');
INSERT INTO `quotes` VALUES(30, 'The problem is no longer that with every pair of hands that comes into the world there comes a hungry stomach.  Rather it is that, attached to those hands are sharp elbows.  ', 'Paul A. Samuelson');
INSERT INTO `quotes` VALUES(31, 'Suburbia is where the developer bulldozes out the trees, then names the streets after them.  ', 'Bill Vaughn');
INSERT INTO `quotes` VALUES(32, 'For 200 years we''ve been conquering Nature.  Now we''re beating it to death.  ', 'Tom McMillan, quoted in Francesca Lyman, The Greenhouse Trap, 1990');
INSERT INTO `quotes` VALUES(33, 'If civilization has risen from the Stone Age, it can rise again from the Wastepaper Age.  ', 'Jacques Barzun, The House of Intellect, 1959');
INSERT INTO `quotes` VALUES(34, 'I would feel more optimistic about a bright future for man if he spent less time proving that he can outwit Nature and more time tasting her sweetness and respecting her seniority.  ', 'Elwyn Brooks White, Essays of E.B. White, 1977');
INSERT INTO `quotes` VALUES(35, 'The insufferable arrogance of human beings to think that Nature was made solely for their benefit, as if it was conceivable that the sun had been set afire merely to ripen men''s apples and head their cabbages.  ', 'Savinien de Cyrano de Bergerac, États et empires de la lune, 1656');
INSERT INTO `quotes` VALUES(36, 'Such is the audacity of man, that he hath learned to counterfeit Nature, yea, and is so bold as to challenge her in her work.  ', 'Pliny the Elder, The Natural History, translated by Philemon Holland');
INSERT INTO `quotes` VALUES(37, 'A living planet is a much more complex metaphor for deity than just a bigger father with a bigger fist.  If an omniscient, all-powerful Dad ignores your prayers, it''s taken personally.  Hear only silence long enough, and you start wondering about his power.  His fairness.  His very existence.  But if a world mother doesn''t reply, Her excuse is simple.  She never claimed conceited omnipotence.  She has countless others clinging to her apron strings, including myriad species unable to speak for themselves.  To Her elder offspring She says - go raid the fridge.  Go play outside.  Go get a job.  Or, better yet, lend me a hand.  I have no time for idle whining.  ', 'David Brin');
INSERT INTO `quotes` VALUES(38, 'Why do people give each other flowers?  To celebrate various important occasions, they''re killing living creatures?  Why restrict it to plants?  ''Sweetheart, let''s make up.  Have this deceased squirrel.''  ', 'The Washington Post');
INSERT INTO `quotes` VALUES(39, 'Till now man has been up against Nature; from now on he will be up against his own nature.  ', 'Dennis Gabor, Inventing the Future, 1964');
INSERT INTO `quotes` VALUES(40, 'Politics is the art of controlling your environment.', 'Hunter S. Thompson ');
INSERT INTO `quotes` VALUES(41, 'Birds are indicators of the environment. If they are in trouble, we know we''ll soon be in trouble.', 'Roger Tory Peterson');
INSERT INTO `quotes` VALUES(42, 'There is no such place as away.', 'Chief Seattle');
INSERT INTO `quotes` VALUES(43, 'May the footprints we leave behind show that we’ve walked in kindness toward the Earth and every living thing.', 'Inspired by Native American philosophy');
INSERT INTO `quotes` VALUES(44, 'I think the environment should be put in the category of our national security. Defence of our resources is just as important as defence abroad. Otherwise what is there to defend?', 'Robert Redford');
INSERT INTO `quotes` VALUES(45, 'Researchers at the US National Institutes of Health estimated that the production of\r\nwasted food required the expenditure of over 25% of the total freshwater used in the United States and around 300 million barrels of oil.', 'Hyman/Buzby');
INSERT INTO `quotes` VALUES(46, 'Food that is produced, regardless of\r\nwhether it is consumed or wasted, has contributed to pressure on the availability of fresh water and other natural resources.', 'Hyman/Buzby');
INSERT INTO `quotes` VALUES(47, 'Incinerating food waste creates emissions that can negatively impact human health and the environment.', 'Hyman/Buzby');
INSERT INTO `quotes` VALUES(48, 'In 2008, the estimated total value of food loss at the retail and consumer levels in the United States was $165.6 billion.', 'Hyman/Buzby');
INSERT INTO `quotes` VALUES(49, 'In the most general sense, a 1% reduction in food loss would result in reducing the value of food loss by a substantial $1.66 billion.', 'Hyman/Buzby');
INSERT INTO `quotes` VALUES(50, 'On a per capita basis in 2008, the food lost from the food supply at the consumer level is equivalent to 124 kg of food per year at an estimated retail price of $390/year at retail prices or .03 kg of food per day valued at $1.07/day.', 'Hyman/Buzby');


ALTER TABLE `quotes`
  ADD UNIQUE KEY `id_2` (`id`),
  ADD KEY `id` (`id`);


ALTER TABLE `quotes`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=51;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
