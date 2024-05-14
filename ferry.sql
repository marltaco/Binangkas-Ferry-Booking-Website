  CREATE TABLE `cabin` (
    `CabinNumber` int(11) NOT NULL AUTO_INCREMENT,
    `CabinType` varchar(50) NOT NULL,
    `Capacity` int(11) NOT NULL,
    `Price` decimal(10,2) NOT NULL,
    PRIMARY KEY (`CabinNumber`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

  CREATE TABLE `cruise` (
    `cruiseID` int(11) NOT NULL AUTO_INCREMENT,
    `Arrival_date` date NOT NULL,
    `Destination` varchar(50) NOT NULL,
    `CruiseName` varchar(50) NOT NULL,
    `Price` decimal(10,2) NOT NULL,
    PRIMARY KEY (`cruiseID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

  CREATE TABLE `passenger` (
    `passengerID` int(11) NOT NULL AUTO_INCREMENT,
    `name` varchar(50) NOT NULL,
    `DOB` varchar(50) NOT NULL,
    `Phone_number` varchar(50) NOT NULL,
    `gender` varchar(50) NOT NULL,
    `email` varchar(50) NOT NULL,
    PRIMARY KEY (`passengerID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

CREATE TABLE `payment` (
  `TransactionID` int(11) NOT NULL AUTO_INCREMENT,
  `PaymentMethod` varchar(50) NOT NULL,
  `Amount` decimal(10,2) NOT NULL,
  `PassengerID` int(11) DEFAULT NULL,
  `CreditCardNo` binary(64) NOT NULL,
  PRIMARY KEY (`TransactionID`),
  KEY `fk_PassengerID` (`PassengerID`),
  CONSTRAINT `fk_PassengerID` FOREIGN KEY (`PassengerID`) REFERENCES `passenger` (`passengerID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci


CREATE TABLE `reservation` (
  `ReservationID` int(11) NOT NULL AUTO_INCREMENT,
  `PassengerID` int(11) NOT NULL,
  `CruiseID` int(11) NOT NULL,
  `CabinType` varchar(255) NOT NULL,
  `ReservationDate` date NOT NULL,
  `TotalPrice` decimal(10,2) DEFAULT NULL,
  `TripType` varchar(50) DEFAULT NULL,
  `DepartureDate` date NOT NULL,
  `ReturnDate` date NOT NULL,
  `returnCruise` int(11) DEFAULT NULL,
  PRIMARY KEY (`ReservationID`),
  KEY `PassengerID` (`PassengerID`),
  KEY `CruiseID` (`CruiseID`),
  KEY `FK_CabinNumber` (`CabinType`),
  KEY `fk_returnCruise` (`returnCruise`),
  CONSTRAINT `fk_returnCruise` FOREIGN KEY (`returnCruise`) REFERENCES `cruise` (`cruiseID`),
  CONSTRAINT `reservation_ibfk_1` FOREIGN KEY (`PassengerID`) REFERENCES `passenger` (`passengerID`),
  CONSTRAINT `reservation_ibfk_2` FOREIGN KEY (`CruiseID`) REFERENCES `cruise` (`cruiseID`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

  CREATE TABLE `destinations` (
    `destinationID` int(11) NOT NULL AUTO_INCREMENT,
    `locationName` varchar(50) NOT NULL,
    `image_url` varchar(50) NOT NULL,
    PRIMARY KEY (`destinationID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

  CREATE TABLE `origins` (
    `originID` int(11) NOT NULL AUTO_INCREMENT,
    `originName` varchar(50) NOT NULL,
    `destinationID` int(11) NOT NULL,
    PRIMARY KEY (`originID`),
    KEY `destinationID` (`destinationID`),
    CONSTRAINT `origins_ibfk_1` FOREIGN KEY (`destinationID`) REFERENCES `destinations` (`destinationID`)
  ) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

  CREATE TABLE origin_destination (
      originID int(11) NOT NULL,
      destinationID int(11) NOT NULL,
      PRIMARY KEY (originID, destinationID),
      FOREIGN KEY (originID) REFERENCES origins(originID),
      FOREIGN KEY (destinationID) REFERENCES destinations(destinationID)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;
  CREATE TABLE `cabin` (
    `CabinNumber` int(11) NOT NULL AUTO_INCREMENT,
    `CabinType` varchar(50) NOT NULL,
    `Capacity` int(11) NOT NULL,
    `Price` decimal(10,2) NOT NULL,
    PRIMARY KEY (`CabinNumber`)
  ) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

  CREATE TABLE `origin_cruise` (
    `originID` int(11) NOT NULL,
    `cruiseID` int(11) NOT NULL,
    PRIMARY KEY (`originID`,`cruiseID`),
    KEY `cruiseID` (`cruiseID`),
    CONSTRAINT `origin_cruise_ibfk_1` FOREIGN KEY (`originID`) REFERENCES `origins` (`originID`),
    CONSTRAINT `origin_cruise_ibfk_2` FOREIGN KEY (`cruiseID`) REFERENCES `cruise` (`cruiseID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci

  CREATE TABLE `return_cruise` (
    `originID` int(11) NOT NULL,
    `cruiseID` int(11) NOT NULL,
    PRIMARY KEY (`originID`,`cruiseID`),
    KEY `cruiseID` (`cruiseID`),
    CONSTRAINT `return_cruise_ibfk_1` FOREIGN KEY (`originID`) REFERENCES `origins` (`originID`),
    CONSTRAINT `return_cruise_ibfk_2` FOREIGN KEY (`cruiseID`) REFERENCES `cruise` (`cruiseID`)
  ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci
