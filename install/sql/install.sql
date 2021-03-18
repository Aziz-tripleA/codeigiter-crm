SET sql_mode='';


CREATE TABLE IF NOT EXISTS `action_serial` (
`id` int(11) unsigned
,`appointment_id` varchar(250)
,`patient_id` varchar(250)
,`phone_number` varchar(120)
,`schedul_id` int(11)
,`date` date
,`sequence` varchar(100)
,`doctor_id` int(11)
,`problem` varchar(255)
,`get_date_time` datetime
,`get_by` int(11)
,`status` int(11)
,`day` int(11)
,`start_time` time
,`end_time` time
,`per_patient_time` int(11)
,`visibility` int(11)
);

-- --------------------------------------------------------

--
-- Table structure for table `appointment_tbl`
--

CREATE TABLE IF NOT EXISTS `appointment_tbl` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `appointment_id` varchar(250) NOT NULL,
  `patient_id` varchar(250) NOT NULL,
  `phone_number` varchar(120) DEFAULT NULL,
  `doctor_id` int(11) NOT NULL,
  `schedul_id` int(11) NOT NULL,
  `sequence` varchar(100) NOT NULL,
  `problem` varchar(255) NOT NULL,
  `get_date_time` datetime NOT NULL,
  `get_by` int(11) NOT NULL,
  `date` date NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `app_setting`
--

CREATE TABLE IF NOT EXISTS `app_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(55) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `app_setting`
--

INSERT INTO `app_setting` (`id`, `language`) VALUES
(1, 'english');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `mc_id` int(11) NOT NULL AUTO_INCREMENT,
  `md_id` int(11) DEFAULT NULL,
  `cat_name` varchar(255) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `ms_id` int(11) NOT NULL,
  PRIMARY KEY (`mc_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`mc_id`, `md_id`, `cat_name`, `lang_id`, `ms_id`) VALUES
(1, 1, 'Category One', 1, 1),
(2, 2, 'Cata Two', 2, 2),
(3, 23, 'Category Three', 2, 4),
(5, 27, 'Setp_2', 2, 8),
(6, 27, 'Setp_3', 2, 8),
(7, 27, 'Setp_1', 2, 8);

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE IF NOT EXISTS `ci_sessions` (
  `id` varchar(40) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `classification`
--

CREATE TABLE IF NOT EXISTS `classification` (
  `classific_id` int(11) NOT NULL AUTO_INCREMENT,
  `classification` text DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`classific_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `classification`
--

INSERT INTO `classification` (`classific_id`, `classification`, `cat_id`, `lang_id`) VALUES
(4, 'Normal', 7, 2),
(5, 'Serious', 5, 2),
(8, 'Emergency ', 7, 2),
(9, 'Accident ', 6, 2),
(10, 'Critical ', 5, 2);

-- --------------------------------------------------------

--
-- Table structure for table `custom_sms_info`
--

CREATE TABLE IF NOT EXISTS `custom_sms_info` (
  `custom_sms_id` int(11) NOT NULL,
  `reciver` varchar(100) NOT NULL,
  `gateway` text NOT NULL,
  `message` text NOT NULL,
  `sms_date_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;




CREATE TABLE IF NOT EXISTS `disease` (
  `md_id` int(11) NOT NULL AUTO_INCREMENT,
  `ms_id` int(11) DEFAULT NULL,
  `disease_name` text DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`md_id`)
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `disease`
--

INSERT INTO `disease` (`md_id`, `ms_id`, `disease_name`, `lang_id`) VALUES
(1, 1, 'Disease One', 1),
(2, 2, 'Disease Two', 2),
(26, 9, 'Not conform', 2),
(27, 8, 'Covic-19', 2),
(29, 8, 'Hanta-20', 2),
(31, 4, 'Leg fracture ', 2),
(32, 5, 'Brain tumor ', 2),
(33, 1, 'Fever ', 1);

-- --------------------------------------------------------

--
-- Table structure for table `doctor_details`
--

CREATE TABLE IF NOT EXISTS `doctor_details` (
  `doctor_details_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `doctor_short_bio` text DEFAULT NULL,
  `doctor_details_bio` text DEFAULT NULL,
  `academic_info` text DEFAULT NULL,
  `work_experience` text DEFAULT NULL,
  PRIMARY KEY (`doctor_details_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `doctor_tbl`
--

CREATE TABLE IF NOT EXISTS `doctor_tbl` (
  `doctor_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `log_id` int(11) NOT NULL,
  `doctor_name` varchar(120) DEFAULT NULL,
  `department` varchar(255) DEFAULT NULL,
  `designation` varchar(120) DEFAULT NULL,
  `degrees` text DEFAULT NULL,
  `specialist` varchar(250) DEFAULT NULL,
  `doctor_exp` text DEFAULT NULL,
  `birth_date` date DEFAULT NULL,
  `sex` varchar(50) DEFAULT NULL,
  `blood_group` varchar(50) DEFAULT NULL,
  `doctor_phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `service_place` text DEFAULT NULL,
  `about_me` text DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `doctor_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`doctor_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_config`
--

CREATE TABLE IF NOT EXISTS `email_config` (
  `email_config_id` int(11) NOT NULL AUTO_INCREMENT,
  `at_appointment` int(11) NOT NULL,
  `at_registration` int(11) NOT NULL,
  `reminder` int(11) NOT NULL,
  `protocol` text NOT NULL,
  `mailpath` text NOT NULL,
  `smtp_port` varchar(100) NOT NULL,
  `smtp_username` varchar(100) NOT NULL,
  `smtp_password` varchar(100) NOT NULL,
  `mailtype` text NOT NULL,
  `sender` text NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`email_config_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_config`
--

INSERT INTO `email_config` (`email_config_id`, `at_appointment`, `at_registration`, `reminder`, `protocol`, `mailpath`, `smtp_port`, `smtp_username`, `smtp_password`, `mailtype`, `sender`, `status`) VALUES
(1, 1, 1, 1, 'smtp', 'ssl://smtp.googlemail.com', '465', 'e@gmail.com', '2233', 'html', 'doctorss@gmail.com', 1);

-- --------------------------------------------------------

--
-- Table structure for table `email_delivery`
--

CREATE TABLE IF NOT EXISTS `email_delivery` (
  `email_delivery_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_ss_id` int(11) DEFAULT NULL,
  `reciver_email` varchar(120) NOT NULL,
  `delivery_date_time` datetime NOT NULL,
  `email_info_id` int(11) DEFAULT NULL,
  `message` longtext DEFAULT NULL,
  PRIMARY KEY (`email_delivery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_info`
--

CREATE TABLE IF NOT EXISTS `email_info` (
  `email_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` varchar(255) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `patient_phone` varchar(111) NOT NULL,
  `patient_email` varchar(111) DEFAULT NULL,
  `appointment_date` datetime NOT NULL,
  `appointment_id` varchar(111) NOT NULL,
  `status` int(11) DEFAULT 0,
  `email_counter` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`email_info_id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_info`
--

INSERT INTO `email_info` (`email_info_id`, `patient_id`, `doctor_id`, `patient_phone`, `patient_email`, `appointment_date`, `appointment_id`, `status`, `email_counter`) VALUES
(1, 'P17K8JD', 5, '534535345345', 'hena@gmail.com', '2017-11-20 02:00:00', 'A17JR0IC', 0, 0),
(2, 'P17YVT8', 5, '35235345', 'doctor@gmail.com', '2017-11-21 02:00:00', 'A17R72WB', 0, 0),
(3, 'P20UNNL', 8, '1234567890', 'tuhint@gmail.com', '2020-06-15 05:00:00', 'A20EKG5X', 0, 0),
(4, 'P20MF25', 8, '12345678901', 'tuhint@gmail.com', '2020-06-21 05:00:00', 'A20M3GU0', 0, 0),
(5, 'P20MF25', 8, '12345678901', 'tuhint@gmail.com', '2020-06-22 05:00:00', 'A20JE52C', 0, 0),
(6, 'P20UNNL', 8, '1234567890', 'tuhint@gmail.com', '2020-06-21 05:00:00', 'A20NRC7D', 0, 0),
(7, 'P20W7VX', 8, '1234567863', 'bdbosskhan13@gmail.com', '2020-06-22 05:00:00', 'A20PJAO2', 0, 0),
(8, 'P20UNNL', 9, '1234567890', 'tuhint@gmail.com', '2020-06-23 05:00:00', 'A20WAK88', 0, 0),
(9, 'P20UNNL', 8, '1234567890', 'tuhint@gmail.com', '2020-06-30 05:00:00', 'A20HDC8U', 0, 0),
(10, 'P20UNNL', 10, '1234567890', 'tuhint@gmail.com', '2020-06-30 03:00:00', 'A20012UB', 0, 0),
(11, 'P20401A', 10, '01751194211', 'tpn@gmail.com', '2020-06-30 03:00:00', 'A20MJZDK', 0, 0),
(12, 'P20UNNL', 9, '1234567890', 'tuhint@gmail.com', '2020-06-30 05:00:00', 'A20DIIM3', 0, 0),
(13, 'P20UNNL', 10, '1234567890', 'tuhint@gmail.com', '2020-07-01 03:00:00', 'A20BK1GJ', 0, 0),
(14, 'P207IQO', 2, '846589465', 'lucy@email.com', '2020-07-01 09:00:00', 'A20XSHHI', 0, 0),
(15, 'P207IQO', 2, '846589465', 'lucy@email.com', '2020-07-07 09:00:00', 'A20JU72I', 0, 0),
(16, 'P207MZE', 2, '54286565464', 'jonson@email.com', '2020-07-01 09:00:00', 'A20DIEFL', 0, 0),
(17, 'P207MZE', 2, '54286565464', 'jonson@email.com', '2020-07-14 09:00:00', 'A20IP4UT', 0, 0),
(18, 'P207IQO', 2, '846589465', 'lucy@email.com', '2020-07-09 09:00:00', 'A20BUZGE', 0, 0),
(19, 'P207MZE', 2, '54286565464', 'jonson@email.com', '2020-07-08 09:00:00', 'A20856DS', 0, 0),
(20, 'P207IQO', 4, '846589465', 'lucy@email.com', '2020-07-03 10:00:00', 'A20GWPCM', 0, 0),
(21, 'P207IQO', 4, '846589465', 'lucy@email.com', '2020-07-17 10:00:00', 'A20EWCOX', 0, 0),
(22, 'P20ERM2', 2, '', 'jenifer@email.com', '2020-07-08 09:00:00', 'A20D9F88', 0, 0),
(23, 'P20ROZ3', 4, '986548654', 'henry@email.com', '2020-07-17 10:00:00', 'A20W9I0N', 0, 0),
(24, 'P207MZE', 4, '54286565464', 'jonson@email.com', '2020-07-18 10:00:00', 'A205D0NT', 0, 0),
(25, 'P207IQO', 2, '846589465', 'lucy@email.com', '2020-07-15 09:00:00', 'A20WXV56', 0, 0),
(26, 'P201T0I', 7, '987548974984', 'gorge@email.com', '2020-07-11 16:00:00', 'A20OO84N', 0, 0),
(27, 'P201T0I', 7, '987548974984', 'gorge@email.com', '2020-07-21 16:00:00', 'A20T2WVY', 0, 0),
(28, 'P201T0I', 2, '987548974984', 'gorge@email.com', '2020-07-07 09:00:00', 'A20649VY', 0, 0),
(29, 'P201T0I', 6, '987548974984', 'gorge@email.com', '2020-07-14 04:00:00', 'A204E81M', 0, 0),
(30, 'P201UBK', 6, '15165155165', 'jenifer@email.com', '2020-07-09 08:00:00', 'A20JYIV5', 0, 0),
(31, 'P207IQO', 6, '846589465', 'lucy@email.com', '2020-07-16 08:00:00', 'A20UL1P0', 0, 0),
(32, 'P207IQO', 17, '846589465', 'lucy@email.com', '2020-07-21 10:00:00', 'A20OGGFB', 0, 0),
(33, 'P20CMGW', 17, '01830014745', 'sojibc@gmail.com', '2020-07-21 10:00:00', 'A20G8HBN', 0, 0),
(34, 'P20CMGW', 17, '01830014745', 'sojibc@gmail.com', '2020-07-14 10:00:00', 'A20T9L7W', 0, 0),
(35, 'P20CMGW', 17, '01830014745', 'sojibc@gmail.com', '2020-07-15 10:00:00', 'A20ZH5UM', 0, 0),
(36, 'P20J77W', 17, '8754986454', 'smith@email.com', '2020-07-14 10:00:00', 'A20OUC9A', 0, 0),
(37, 'P20Z4M0', 17, '014830014474', 'a@gmail.com', '2020-07-14 10:00:00', 'A20G4C6M', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `email_schedule`
--

CREATE TABLE IF NOT EXISTS `email_schedule` (
  `email_ss_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_temp_id` int(11) NOT NULL,
  `email_ss_name` text NOT NULL,
  `email_schedule` varchar(100) NOT NULL,
  `email_ss_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`email_ss_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `email_template`
--

CREATE TABLE IF NOT EXISTS `email_template` (
  `email_temp_id` int(11) NOT NULL AUTO_INCREMENT,
  `email_temp_name` text NOT NULL,
  `email_template` longtext NOT NULL,
  `email_temp_status` int(11) DEFAULT 1,
  `default_status` int(11) NOT NULL DEFAULT 0,
  `template_type` int(11) NOT NULL DEFAULT 0,
  `set_default` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`email_temp_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `email_template`
--

INSERT INTO `email_template` (`email_temp_id`, `email_temp_name`, `email_template`, `email_temp_status`, `default_status`, `template_type`, `set_default`) VALUES
(1, 'Default Template', '\r\n \r\n  \r\n    <meta http-equiv=\"Content-Type\" content=\"text/html; charset=UTF-8\">\r\n   <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">\r\n    <title>Doctoress</title>\r\n\r\n    <style type=\"text/css\">\r\n\r\n\r\n     @media only screen and (max-width: 680px){\r\n        body{width:100% !important; min-width:100% !important;} \r\n        \r\n        table[id=\"emailBody\"],\r\n        table[class=\"flexibleContainer\"],\r\n       td[class=\"flexibleContainerCell\"] {width:100% !important;}\r\n        td[class=\"flexibleContainerBox\"], td[class=\"flexibleContainerBox\"] table {display: block;width: 100%;text-align: left;}\r\n       table[class=\"flexibleContainerBoxNext\"]{padding-top: 10px !important;}\r\n  \r\n      }\r\n   </style>\r\n\r\n\r\n  \r\n\r\n\r\n  \r\n\r\n    <center style=\"background-color:#E1E1E1;\">\r\n      <table id=\"bodyTable\" style=\"table-layout: fixed;max-width:100% !important;width: 100% !important;min-width: 100% !important;\" width=\"100%\" height=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n       <tbody><tr>\r\n         <td valign=\"top\" align=\"center\">\r\n\r\n\r\n            <table id=\"emailBody\" width=\"700\" bgcolor=\"#FFFFFF\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n\r\n             <tbody><tr>\r\n               <td valign=\"top\" align=\"center\">\r\n\r\n                  <table style=\"color:#FFFFFF;\" width=\"100%\" bgcolor=\"#3498db\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                    <tbody><tr>\r\n                     <td valign=\"top\" align=\"center\">\r\n\r\n                        <table class=\"flexibleContainer\" width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                          <tbody><tr>\r\n                           <td class=\"flexibleContainerCell\" valign=\"top\" width=\"700\" align=\"center\">\r\n\r\n                            \r\n                              <table width=\"100%\" border=\"0\" cellpadding=\"30\" cellspacing=\"0\">\r\n                                <tbody><tr>\r\n                                 <td class=\"textContent\" valign=\"top\" align=\"center\">\r\n                                    <h1 style=\"color:#FFFFFF;line-height:100%;font-family:Helvetica,Arial,sans-serif;font-size:35px;font-weight:normal;margin-bottom:5px;text-align:center;\">\r\n                                   Hi! %patient_name%</h1>\r\n                                   <h2 style=\"text-align:center;font-weight:normal;font-family:Helvetica,Arial,sans-serif;font-size:23px;margin-bottom:10px;color:#205478;line-height:135%;\">\r\n                                    Your Appointment Information</h2>\r\n                                 </td>\r\n                               </tr>\r\n                             </tbody></table>\r\n\r\n                            </td>\r\n                         </tr>\r\n                       </tbody></table>\r\n                        \r\n                      </td>\r\n                   </tr>\r\n                 </tbody></table>\r\n                </td>\r\n             </tr>\r\n\r\n\r\n             <tr>\r\n                <td valign=\"top\" align=\"center\">\r\n\r\n                  <table style=\"color:#FFFFFF;\" width=\"100%\" bgcolor=\"#3498db\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                    <tbody><tr>\r\n                     <td valign=\"top\" align=\"center\">\r\n\r\n                        <table class=\"flexibleContainer\" width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                          <tbody><tr>\r\n                           <td class=\"flexibleContainerCell\" valign=\"top\" width=\"700\" align=\"center\">\r\n\r\n                            \r\n                              <table width=\"100%\" border=\"0\" cellpadding=\"30\" cellspacing=\"0\">\r\n                                <tbody><tr>\r\n                                 <td class=\"textContent\" valign=\"top\" align=\"center\">\r\n                                    <p style=\"text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#fff;line-height:135%;\">\r\n                                      Thnks for your appointment request to %doctor_name% .\r\n                                     This is an automatic system generated email as with na\r\n                                      appointment.\r\n                                      Your appointment details as below...\r\n                                    </p>\r\n                                  </td>\r\n                               </tr>\r\n                             </tbody></table>\r\n\r\n                            </td>\r\n                         </tr>\r\n                       </tbody></table>\r\n                        \r\n                      </td>\r\n                   </tr>\r\n                 </tbody></table>\r\n                </td>\r\n             </tr>\r\n         \r\n              <tr>\r\n                <td valign=\"top\" align=\"center\">\r\n                  <table width=\"100%\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                   <tbody><tr>\r\n                     <td valign=\"top\" align=\"center\">\r\n                        <table class=\"flexibleContainer\" width=\"700\" border=\"0\" cellpadding=\"30\" cellspacing=\"0\">\r\n                         <tbody><tr>\r\n                           <td class=\"flexibleContainerCell\" valign=\"top\" width=\"700\">\r\n\r\n                             <table width=\"100%\" align=\"left\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                <tbody><tr>\r\n                                 <td class=\"flexibleContainerBox\" valign=\"middle\" align=\"left\">\r\n                                    <table class=\"flexibleContainerBoxNext\" style=\"max-width: 100%;\" width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                                      <tbody><tr>\r\n                                       <td style=\"margin-left: 1em;\">\r\n                                          <h3 style=\"color:#5F5F5F;line-height:125%;font-family:Helvetica,Arial,sans-serif;font-size:20px;font-weight:normal;margin-top:0;margin-bottom:3px;text-align:left;\">\r\n                                            Your name : %patient_name%</h3>\r\n                                         <div style=\"text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;\">\r\n                                            Your ID : %patient_id%, </div>\r\n                                         <div style=\"text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;\">\r\n                                            Appointment ID : %appointment_id%, </div>\r\n                                          <div style=\"text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;\">\r\n                                            Serial : %sequence% </div>\r\n                                         <div style=\"text-align:left;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#5F5F5F;line-height:135%;\">\r\n                                            and Appointment Date : %appointment_date%. \r\n                                          </div>\r\n                                        </td>\r\n                                     </tr>\r\n                                   </tbody></table>\r\n                                  </td>\r\n                               </tr>\r\n                             </tbody></table>\r\n                            </td>\r\n                         </tr>\r\n                       </tbody></table>\r\n                      </td>\r\n                   </tr>\r\n                 </tbody></table>\r\n                </td>\r\n             </tr>\r\n\r\n\r\n             <tr>\r\n                <td valign=\"top\" align=\"center\">\r\n\r\n                  <table style=\"color:#FFFFFF;\" width=\"100%\" bgcolor=\"#3498db\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                    <tbody><tr>\r\n                     <td valign=\"top\" align=\"center\">\r\n\r\n                        <table class=\"flexibleContainer\" width=\"700\" border=\"0\" cellpadding=\"0\" cellspacing=\"0\">\r\n                          <tbody><tr>\r\n                           <td class=\"flexibleContainerCell\" valign=\"top\" width=\"700\" align=\"center\">\r\n\r\n                            \r\n                              <table width=\"100%\" border=\"0\" cellpadding=\"30\" cellspacing=\"0\">\r\n                                <tbody><tr>\r\n                                 <td class=\"textContent\" valign=\"top\" align=\"center\">\r\n                                    \r\n                                    <div style=\"text-align:center;font-family:Helvetica,Arial,sans-serif;font-size:15px;margin-bottom:0;color:#FFFFFF;line-height:135%;\">\r\n                                      Thank you for the Appointment\r\n                                    </div>\r\n                                  </td>\r\n                               </tr>\r\n                             </tbody></table>\r\n\r\n                            </td>\r\n                         </tr>\r\n                       </tbody></table>\r\n                        \r\n                      </td>\r\n                   </tr>\r\n                 </tbody></table>\r\n                </td>\r\n             </tr>\r\n\r\n         \r\n        \r\n      </tbody></table>\r\n    \r\n  \r\n\r\n</td></tr></tbody></table></center>', 1, 1, 0, 1),
(3, 'Appointment ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum vulputate diam, aliquam egestas nibh ante vel dui. Sed in.<br></p>                                         ', 1, 0, 0, 0),
(6, 'Prescription ', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit.<br></p>', 1, 0, 0, 0),
(7, 'Invoice', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit.<br></p>', 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `emergency_stop_tbl`
--

CREATE TABLE IF NOT EXISTS `emergency_stop_tbl` (
  `stop_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `stop_date` date NOT NULL,
  `schedul_date` date NOT NULL,
  `message` varchar(255) NOT NULL,
  PRIMARY KEY (`stop_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `herbs`
--

CREATE TABLE IF NOT EXISTS `herbs` (
  `herbs_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_id` int(11) NOT NULL,
  `herbs` text NOT NULL,
  PRIMARY KEY (`herbs_id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `herbs`
--

INSERT INTO `herbs` (`herbs_id`, `lang_id`, `herbs`) VALUES
(1, 1, 'Herbs One'),
(2, 2, 'herbs2'),
(3, 1, 'herbs3'),
(4, 2, 'herbs4'),
(5, 2, 'h1'),
(6, 2, 'h2'),
(8, 3, 'h3'),
(9, 3, 'h4'),
(10, 3, 'h5'),
(11, 3, 'h6'),
(12, 3, 'h7'),
(13, 3, 'h8'),
(14, 3, 'h9'),
(15, 2, 'Medicien Herb2');

-- --------------------------------------------------------

--
-- Table structure for table `insurance`
--

CREATE TABLE IF NOT EXISTS `insurance` (
  `insurance_id` int(11) NOT NULL AUTO_INCREMENT,
  `insurance_company_name` text DEFAULT NULL,
  PRIMARY KEY (`insurance_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE IF NOT EXISTS `invoice` (
  `invoice_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `patient_id` varchar(111) NOT NULL,
  `grand_total` int(11) NOT NULL,
  `total_tax` int(11) NOT NULL,
  `paid` int(11) NOT NULL,
  `due` int(11) NOT NULL,
  `payment_notes` text DEFAULT NULL,
  `payment_method` varchar(250) NOT NULL,
  `payment_method_notes` text DEFAULT NULL,
  `date_time` date NOT NULL,
  PRIMARY KEY (`invoice_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `invoice_product`
--

CREATE TABLE IF NOT EXISTS `invoice_product` (
  `inv_p_id` int(11) NOT NULL AUTO_INCREMENT,
  `invoice_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `grand_price` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `discount` int(11) NOT NULL,
  PRIMARY KEY (`inv_p_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE IF NOT EXISTS `language` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `phrase` text NOT NULL,
  `english` text DEFAULT NULL,
  `spanish` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=410 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `language`
--

INSERT INTO `language` (`id`, `phrase`, `english`, `spanish`) VALUES
(1, 'deashbord', 'Dashboard', ''),
(2, 'prescription', 'Prescription', ''),
(3, 'appointment', 'Appointment', ''),
(4, 'create_trade', 'Create (Trade)', ''),
(5, 'create_generic', 'Create (Generic)', ''),
(6, 'create_appointment', 'Create Appointment', ''),
(7, 'appointment_list', 'Appointment List', ''),
(8, 'patient', 'Patient', ''),
(9, 'add_new_patient', 'Add New Patient', ''),
(10, 'patient_list', 'Patient List', ''),
(11, 'schedule', 'Schedule', ''),
(12, 'add_schedule', 'Add Schedule', ''),
(13, 'schedule_list', 'Schedule List', ''),
(14, 'emergency_stop', 'Emergency Stop', ''),
(15, 'stop', 'Stop', ''),
(16, 'emergency_stop_list', 'Emergency Stop List', ''),
(17, 'venue', 'Venue', ''),
(18, 'create_venue', 'Create Venue', ''),
(19, 'venue_list', 'Venue List', ''),
(20, 'setup_data', 'Setup Data', ''),
(21, 'add_medicine', 'Add New Medicine', ''),
(22, 'medicine_list', 'Medicine List', ''),
(23, 'add_company', 'Add Company', ''),
(24, 'add_group', 'Add Group', ''),
(25, 'add_advice', 'Add Advice', ''),
(26, 'add_test_name', 'Add Test Name', ''),
(27, 'test_list', 'Test List', ''),
(28, 'users', 'Users', ''),
(29, 'web_site', 'Web Site', ''),
(30, 'language_setting', 'Language Setting', ''),
(31, 'web_setting', 'Web Settiing', ''),
(32, 'header_setup', 'Header Setup', ''),
(33, 'profile', 'Profile', ''),
(34, 'slider', 'Slider setup', ''),
(35, 'blog', 'Blog', ''),
(36, 'add_new_post', 'Add New Post', ''),
(37, 'post_list', 'Post List', ''),
(38, 'gateway', 'Gateway Setup', ''),
(39, 'sms_template', 'Template', ''),
(40, 'send_custom_sms', 'Send Cutom Sms', ''),
(41, 'sms_setup', 'SMS', ''),
(42, 'sms_schedule', 'Sms Schedule', ''),
(43, 'sms_report', 'Sms Report', ''),
(44, 'custom_sms_report', 'Custom SMS Report', ''),
(45, 'auto_sms_report', 'Auto SMS Report', ''),
(46, 'email_setup', 'Email Setup', ''),
(47, 'email_configaretion', 'Email Configaretion', ''),
(48, 'email_template', 'Email Template', ''),
(49, 'email_template_list', 'Email Template List', ''),
(50, 'email_schedule_setup', 'Email Schedule Setup', ''),
(51, 'emergency_stop_setup', 'Emergency Stop Setup', ''),
(52, 'add_new_user', 'Add New User', ''),
(53, 'user_list', 'user List', ''),
(54, 'send_custom_email', 'Send Cutom Email', ''),
(55, 'email_list', 'Email List', ''),
(56, 'prescription_list', 'Prescription List', ''),
(57, 'total_patient', 'Total Patient', ''),
(58, 'today_patient', 'Today Patient', ''),
(59, 'today_appointment', 'Today Appointment', ''),
(60, 'new_appointment', 'New Appointment', ''),
(61, 'total_appointment', 'Total Appointment', ''),
(62, 'today_prescription', 'Today Prescription', ''),
(63, 'total_prescription', 'Total Prescription', ''),
(64, 'total_sms', 'Total SMS', ''),
(65, 'today_sms', 'Today SMS', ''),
(66, 'custom_sms', 'Custom SMS', ''),
(67, 'auto_sms', 'Auto SMS', ''),
(68, 'total_send_email', 'Total Send Email', ''),
(69, 'line_chart', 'Line Chart', ''),
(70, 'appointment_chart', 'Appointment Chart', ''),
(71, 'patient_chart', 'Patient Chart', ''),
(72, 'chart_shows_total_report', 'This chart shows total report', ''),
(73, 'appointment_progress', 'This chart shows total appointment progress', ''),
(74, 'patient_progress', 'This chart shows total patient progress', ''),
(75, 'send_total_email', 'Send Total Email', ''),
(76, 'patient_name', 'Patient Name', ''),
(77, 'phone_number', 'Phone Number', ''),
(78, 'birth_date', 'Birth date', ''),
(79, 'age', 'Age', ''),
(80, 'male', 'Male', ''),
(81, 'female', 'Female', ''),
(82, 'others', 'Others', ''),
(83, 'patient_id', 'Patient Id', ''),
(84, 'patient_cc', 'Patient CC', ''),
(85, 'patient_weight', 'Patient Weight', ''),
(86, 'patient_bp', 'Patient BP', ''),
(87, 'oex', 'O/Ex', ''),
(88, 'pd', 'PD', ''),
(89, 'medicine', 'Medicine', ''),
(90, 'type', 'Type', ''),
(91, 'medicine_name', 'Medicine Name', ''),
(92, 'mgml', 'Mg/Ml', ''),
(93, 'dose', 'Dose', ''),
(94, 'day', 'Day', ''),
(95, 'medicine_comment', 'Comments', ''),
(96, 'overal_comment', 'Overall Comment', ''),
(97, 'test', 'Test', ''),
(98, 'add', 'Add', ''),
(99, 'advice', 'Advice', ''),
(100, 'test_name', 'Test Name', ''),
(101, 'submit', 'Submit', ''),
(102, 'reset', 'Reset', ''),
(103, 'description', 'Description', ''),
(104, 'generic_name', 'Generic Name', ''),
(105, 'picture', 'Picture', ''),
(106, 'sex', 'Gender', ''),
(107, 'action', 'Action', ''),
(108, 'appointment_id', 'Appointment Id', ''),
(109, 'date', 'Date', ''),
(110, 'choose_serial', 'Choose Serial', ''),
(111, 'date_placeholder', 'yyyy-mm-dd', ''),
(112, 'sequence', 'Appointment Time', ''),
(113, 'sms', 'Send SMS', ''),
(114, 'sms_gateway', 'SMS Gateway', ''),
(115, 'send', 'Send', ''),
(116, 'sms_message', 'SMS Send Successfully!', ''),
(117, 'name', 'Full Name', ''),
(118, 'email', 'Email Address', ''),
(119, 'blood_group', 'Blood Group', ''),
(120, 'address', 'Address', ''),
(121, 'edit_patient', 'Edit Patient', ''),
(122, 'update', 'Update', ''),
(123, 'visibility', 'Visibility', ''),
(124, 'yes', 'Yes', ''),
(125, 'no', 'No', ''),
(126, 'set_time_msg', 'You can set only minute', ''),
(127, 'set_per_patient_time', 'Per Patient Time', ''),
(128, 'end_time', 'End Time', ''),
(129, 'start_time', 'Start Time', ''),
(130, 'set_time', 'Set Time', ''),
(131, 'saturday', 'Saturday', ''),
(132, 'sunday', 'Sunday', ''),
(133, 'monday', 'Monday', ''),
(134, 'tuesday', 'Tuesday', ''),
(135, 'wednesday', 'Wednesday', ''),
(136, 'thusday', 'Thursday', ''),
(137, 'friday', 'Friday', ''),
(138, 'edit_schedule', 'Edit Schedule', ''),
(139, 'stop_date', 'Stop Date', ''),
(140, 'schedule_date', 'Schedule Date', ''),
(141, 'message', 'Message', ''),
(142, 'specialist', 'Specialist', ''),
(143, 'edit_emergency_stop', 'Edit Emergency Stop', ''),
(144, 'venue_name', 'Venue Name', ''),
(145, 'venue_contact', 'Venue Contact', ''),
(146, 'venue_address', 'Venue Address', ''),
(147, 'venue_map', 'Venue Map', ''),
(148, 'edot_venue', 'Edit Venue', ''),
(149, 'company_name', 'Company Name', ''),
(150, 'group_name', 'Group Name', ''),
(151, 'medicine_description', 'Medicine Description', ''),
(152, 'edit_medicine', 'Edit Medicine', ''),
(153, 'web_site_enable_disable', 'Web site Enable Or Disable', ''),
(154, 'html_code_title', 'Html Code Sample', ''),
(155, 'js_code_title', 'Js Code Sample ', ''),
(156, 'use_thirt_parti_api', 'Use third party Api ', ''),
(157, 'therd_parti_api_preview', 'Third party Api preview', ''),
(158, 'website_enable', 'Website Enable', ''),
(159, 'website_desable', 'website Desable', ''),
(160, 'website_enable_msg', 'If you don\'t want to Show The website, Click the button', ''),
(161, 'website_desable_msg', 'If you want to Show The website, Click the button', ''),
(162, 'html_code_description', 'Html Code Sample Place this code wherever you want the plugin to appear on your page.', ''),
(163, 'js_code_description', 'Place this code wherever you want the plugin to appear on your page.', ''),
(164, 'facebook_link', 'facebook Link', ''),
(165, 'twitter_link', 'twitter Link', ''),
(166, 'youtube_link', 'Youtube Link', ''),
(167, 'linkedin_link', 'Linkedin Link', ''),
(168, 'google_link', 'Google Linlk', ''),
(169, 'working_description', 'Working Description', ''),
(170, 'hotline', 'Hotline', ''),
(171, 'copy_right', 'Copy Right', ''),
(172, 'logo', 'Logo', ''),
(173, 'favicon', 'Favicon', ''),
(174, 'appointment_image', 'Appointment Image', ''),
(175, 'about_image', 'About Image', ''),
(176, 'total_appointment_details', 'Total Appointment details', ''),
(177, 'today_appointment_details', 'Today Appointment Details', ''),
(178, 'total_patient_details', 'Total Patient Details', ''),
(179, 'twitter_post', 'Twitter Post', ''),
(180, 'google_map', 'Google Map', ''),
(181, 'doctor_name', 'Doctor Name', ''),
(182, 'designation', 'Designation', ''),
(183, 'degrees', 'Degrees', ''),
(184, 'department', 'Department', ''),
(185, 'service_place', 'Service Place', ''),
(186, 'about_me', 'About Me', ''),
(187, 'slider_list', 'Slider List', ''),
(188, 'heading', 'Heading', ''),
(189, 'details', 'Details', ''),
(190, 'select_category', 'Select Category', ''),
(191, 'title', 'Title', ''),
(192, 'edit_post', 'Edit Post', ''),
(193, 'edit_slider', 'Edit Slider', ''),
(194, 'category', 'Select Category', ''),
(195, 'category_name', 'Category Name', ''),
(196, 'status', 'Status', ''),
(197, 'provider', 'Provider', ''),
(198, 'user_name', 'User Name', ''),
(199, 'password', 'password', ''),
(200, 'sender', 'Sender', ''),
(201, 'sms_template_list', 'SMS Template List', ''),
(202, 'sms_template_setup', 'SMS Template Setup', ''),
(203, 'template_name', 'Template Name', ''),
(204, 'set_default', 'Set Default', ''),
(205, 'schedule_name', 'Schedule Name', ''),
(206, 'time', 'Time', ''),
(207, 'sms_cronjob_des', 'You can use above link for cron job. Copy and paste at cron job Command box', ''),
(208, 'sms_schedule_list', 'SMS Schedule List', ''),
(209, 'reciver', 'Reciver', ''),
(210, 'from_date', 'From Date', ''),
(211, 'to_date', 'To Date', ''),
(212, 'date_time', 'Date Time', ''),
(213, 'search', 'Search', ''),
(214, 'send_at_appointment', 'Email Send At Appointment Time. ', ''),
(215, 'send_at_registration', 'Email Send At Patient Registretion.', ''),
(216, 'send_by_reminder', 'Email Send By Reminder.', ''),
(217, 'protocol', 'Protocol', ''),
(218, 'mailepath', 'MailPath', ''),
(219, 'mailtype', 'MailType', ''),
(220, 'sender_email', 'Sender Email', ''),
(221, 'email_template_list_of_app', 'Email Template list For Registration', ''),
(222, 'email_template_list_of_reg', 'Email Template list For Appointment', ''),
(223, 'active', 'Active', ''),
(224, 'reciver_email', 'Reciver Email', ''),
(225, 'subject', 'Subject', ''),
(226, 'edit_email_template', 'Edit Email Template', ''),
(227, 'email_schedule_stup', 'Email Schedule Setup', ''),
(228, 'email_schedule_stup_list', 'Email Schedule Setup List', ''),
(229, 'email_cronjob_msg', 'You can use above link for cron job. Copy and paste at cron job Command box.', ''),
(230, 'appointment_info', 'Appointment Information', ''),
(231, 'appointment_footer_msg', 'Kindly Report to Reception 30 minutes Earlier then your appointment', ''),
(232, 'patient_history', ' History', ''),
(233, 'signature', 'Signature', ''),
(234, 'chamber_time', 'CHAMBER TIME', ''),
(235, 'prescription_empty_msg', 'You have no prescription......................', ''),
(236, 'social_link', 'Social Link', ''),
(237, 'recent_news', 'Recent News', ''),
(238, 'latest_twitter', 'Latest Twitter', ''),
(239, 'register', 'REGISTER', ''),
(240, 'doctor_spciality', 'Doctor Spciality', ''),
(241, 'doctor_degrees', 'Doctor Degrees', ''),
(242, 'doctor_experience', 'Doctor Experience', ''),
(243, 'website_title', 'Website Title', ''),
(244, 'home', 'HOME', ''),
(245, 'working_hour', 'WORKING HOURS', ''),
(246, 'testimonial', 'TESTIMONIAL', ''),
(247, 'contact', 'CONTACT', ''),
(248, 'latest_news', 'Latest News', ''),
(249, 'larnmore', 'Larn More', ''),
(250, 'close', 'Close', ''),
(251, 'login', 'Login', ''),
(252, 'doctor', 'Doctor', ''),
(253, 'assistant', 'Assistant', ''),
(254, 'login_title', 'Please Login', ''),
(255, 'login_msg', 'UserEmail or Password are Invalid.', ''),
(256, 'image_upload_msg', 'Image dosn\'t upload!. Image size to large.', ''),
(257, 'website_setup_msg', 'Setup Successgully.', ''),
(258, 'delete_msg', 'Delete Successfull.', ''),
(259, 'edit_msg', 'Edit Successfully.', ''),
(260, 'slider_ste_msg', 'Slider set Successful..', ''),
(261, 'update_msg', 'Update Successfully.', ''),
(262, 'venue_add_msg', 'Venue Added successfully', ''),
(263, 'exist_error_msg', 'It\'s Allrady Exist', ''),
(264, 'register_msg', 'Registeration Successfully.', ''),
(265, 'post_add_msg', 'Add New Post Successfully..', ''),
(266, 'sms_send_msg', 'SMS Send Successfully!', ''),
(267, 'emal_send_msg', 'Email Send Successfully.', ''),
(268, 'schedule_add_msg', 'Schedule Add Successfully.', ''),
(269, 'template_add_msg', 'Add Template Successfully.', ''),
(270, 'gorup_add_msg', 'Group inserted Successful', ''),
(271, 'medicine_add_msg', 'Mdicine inserted Successful', ''),
(272, 'advice_add_msg', 'Advice inserted Successful', ''),
(273, 'test_add_msg', 'Test inserted Successful', ''),
(274, 'company_add_msg', 'Company inserted Successful', ''),
(275, 'password_change_msg', 'Password Change Successfull', ''),
(276, 'password_change_error_msg', 'Your Old Password Dos Not Mathch', ''),
(277, 'schedule_error_msg', 'Already set up scheduled on this day, please select others one day.', ''),
(278, 'emergency_stop_msg', 'Emergency Stop Successfully.', ''),
(279, 'appointment_error_msg', 'Sorry You already get apointment in this date', ''),
(280, 'get', '', ''),
(281, 'get_appointment_msg', 'You Got this appointment Successful..', ''),
(282, 'patient_id_exist_msg', 'This id Is allredy exist, Please try again', ''),
(283, 'venue_empty_msg', 'Sorry there have no assign venue.', ''),
(284, 'email_setup_msg', 'Email Configaretion Successfully.', ''),
(285, 'email_template_add_msg', 'Email Template Add Successfully.', ''),
(286, 'about_menu', 'ABOUT', ''),
(287, 'font_appointment', 'APPOINTMENT', ''),
(288, 'change_password', 'Change Password', ''),
(289, 'logout', 'Logout', ''),
(290, 'register_information', 'Registration Information.', ''),
(291, 'sl', 'SL', ''),
(292, 'pad_print', 'Pad Print', ''),
(293, 'default_print', 'Default Print', ''),
(294, 'history', 'History', ''),
(295, 'temperature', 'Temperature', ''),
(296, 'print_pattern', 'Print Pattern', ''),
(297, 'setup_pattern', 'Setup Print Pattern', ''),
(298, 'pattern_list', 'Setup Pattern List', ''),
(299, 'header_blank', 'Header Blank', ''),
(300, 'footer_blank', 'Footer Blank', ''),
(301, 'side_content', 'Side Content', ''),
(302, 'content_blank', 'Content Blank', ''),
(303, 'height', 'Height', ''),
(304, 'width', 'Width', ''),
(305, 'edit_print_pattern', 'Edit Print Pattern', ''),
(306, 'footer_logo', 'Footer Logo', ''),
(307, 'payment', 'Payment', 'Payment'),
(308, 'setup_payment_method', 'Setup Payment Method', ''),
(309, 'paypal_business_email', 'Paypal Business Email', ''),
(310, 'amount', 'Amount', ''),
(311, 'pyment_list', 'Pyment List', ''),
(312, 'pyment_setup', 'Pyment Setup', ''),
(313, 'payment_setup', 'Payment Setup', ''),
(314, 'payment_list', 'Payment List', ''),
(315, 'notes', 'Notes', ''),
(316, 'doctoress_dashboard', 'Clinic Dashboard', ''),
(317, 'site_view', 'Site View', ''),
(318, 'edit_prescription', 'Edit Prescription', ''),
(319, 'select_message', 'Please Select any one Number', ''),
(320, 'schedule_msg', 'There have no time schedule setup! Please Try Again.', ''),
(321, 'schedule_date_msg', 'Doctor do not seat In this date!', ''),
(322, 'book_sequence', 'You Selected', ''),
(323, 'patient_id_msg', 'Your id is available', ''),
(324, 'patient_name_load_msg', 'Didn\'t match. Please Enter Your Valid Id.', ''),
(325, 'remember_me', 'Remember me', ''),
(326, 'edit_generic', 'Edit(Generic)', ''),
(327, 'sms_list', 'SMS List', ''),
(328, 'time_zone_setup', 'Time Zone Setup', ''),
(329, 'time_setup', 'Select Time Zone', ''),
(330, 'next_follow_up', 'Next Follow Up/ÃƒÂ Ã‚Â¦Ã‚ÂªÃƒÂ Ã‚Â¦Ã‚Â°ÃƒÂ Ã‚Â¦Ã‚Â¬ÃƒÂ Ã‚Â¦Ã‚Â°ÃƒÂ Ã‚Â§Ã‚ÂÃƒÂ Ã‚Â¦Ã‚Â¤ÃƒÂ Ã‚Â§Ã¢â€šÂ¬ ÃƒÂ Ã‚Â¦Ã‚Â¸ÃƒÂ Ã‚Â¦Ã‚Â¾ÃƒÂ Ã‚Â¦Ã¢â‚¬Â¢ÃƒÂ Ã‚Â§Ã‚ÂÃƒÂ Ã‚Â¦Ã‚Â·ÃƒÂ Ã‚Â¦Ã‚Â¾ÃƒÂ Ã‚Â¦Ã‚Â¤', ''),
(331, 'doctor_list', 'Doctor List', ''),
(332, 'new_invoice', 'New Invoice', ''),
(333, 'invoice_list', 'Invoice List', ''),
(334, 'edit_invoice', 'Edit Invoice', ''),
(335, 'service_info', 'Service Info', ''),
(336, 'quantity', 'Quantity', ''),
(337, 'price', 'Price', ''),
(338, 'discount', 'Discount', ''),
(339, 'total', 'Total', ''),
(340, 'total_tax', 'Total Tax', ''),
(341, 'grand_total', 'Grand Total', ''),
(342, 'paid_ammount', 'Paid Ammount', ''),
(343, 'due', 'Due', ''),
(344, 'add_new_service', 'Add New Sevice', ''),
(345, 'payment_notes', 'Payment Notes', ''),
(346, 'payment_method_notes', 'Payment Method Notes', ''),
(347, 'save_and_paid', 'Save And Paid', ''),
(348, 'delete', 'Delete', ''),
(349, 'add_new_invoice', 'Add New Invoice', ''),
(350, 'sl_no', 'SL NO', ''),
(351, 'invoice_id', 'Invoice Id', ''),
(352, 'create_prescription', 'Create Prescription', ''),
(353, 'chief_complain', 'Chief Complain', ''),
(354, 'reference_diagnosis', 'Reference Diagnosis', ''),
(355, 'section', 'Section', ''),
(356, 'language', 'Language', ''),
(357, 'disease', 'Disease', ''),
(358, 'classification', 'Classification', ''),
(359, 'syndromes', 'Syndromes', ''),
(360, 'treatment', 'Treatment', ''),
(361, 'herbs', 'Herbs', ''),
(362, 'comment', 'Comment', ''),
(363, 'inspecsion', 'Inspecsion', ''),
(364, 'treatment_plan', 'Treatment Plan', ''),
(365, 'treatment_goals', 'Treatment Goals', ''),
(366, 'doctor_told', 'Doctor Told', ''),
(367, 'treatment_effect', 'Treatment Effect', ''),
(368, 'treatment_evaluation', 'Treatment evaluation', ''),
(369, 'referral_doctor', 'Referral Doctor', ''),
(370, 'old_password', 'Old Password', ''),
(371, 'new_password', 'New Password', ''),
(372, 'confirm_password', 'confirm Password', ''),
(373, 'change', 'Change', ''),
(374, 'mobile', 'Mobile Number', ''),
(375, 'given_name', 'Given name', ''),
(376, 'family_name', 'Family Name', ''),
(377, 'post_code', 'Post Code', ''),
(378, 'suburb', 'Suburb', ''),
(379, 'work_injury_insurance', 'Work injury insurance claim number', ''),
(380, 'traffic_accident', 'Traffic accident claim number', ''),
(381, 'version_number', 'Veteran number', ''),
(382, 'custom_receipt', 'Custom receipt number attachment', ''),
(383, 'deaggregate', 'Diagnostics', ''),
(384, 'additional_info', 'Additional info', ''),
(385, 'overall_comment', 'Overall comments', ''),
(386, 'create_doctor', 'Create Doctor', ''),
(387, 'add_service', 'Add New Service', ''),
(388, 'service_list', 'Service List', ''),
(389, 'service_name', 'Service Name', ''),
(390, 'tex', 'Tax', ''),
(391, 'service_model', 'Service Model', ''),
(392, 'invoice', 'Invoice', ''),
(393, 'emergency_contact', 'Emergency Contact', ''),
(394, 'madical_info', 'Medical Information', ''),
(395, 'patient_info', 'Patient Information', ''),
(396, 'invoice_recit', 'Invoice Recit', ''),
(397, 'billing_to', 'Billing To', ''),
(398, 'billing_from', 'Billing From', ''),
(399, 'rate', 'Rate', ''),
(400, 'authorised_by', 'Authorised By', ''),
(401, 'crispin', 'Crispin', ''),
(402, 'invoice_no', 'Invoice No', ''),
(403, 'smtp_port', 'SMTO Port', ''),
(404, 'smtp_username', 'SMTP Username', ''),
(405, 'smtp_password', 'SMTP Password', ''),
(406, 'delete_confirm_msg', 'Are you want to delete', ''),
(407, 'lorem', '', ''),
(408, 'paid', 'Paid', NULL),
(409, 'delete_alert', 'Are you want to delete?', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log_info`
--

CREATE TABLE IF NOT EXISTS `log_info` (
  `log_id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(100) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` int(11) DEFAULT NULL,
  `active_status` int(11) DEFAULT 1,
  `logout_time` varchar(120) DEFAULT NULL,
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `medicine`
--

CREATE TABLE IF NOT EXISTS `medicine` (
  `medicine_id` int(11) NOT NULL AUTO_INCREMENT,
  `classification` varchar(255) DEFAULT NULL,
  `symptom` text DEFAULT NULL,
  `treatment` text DEFAULT NULL,
  `medicine` text DEFAULT NULL,
  `cat_id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  `diagonisis` text DEFAULT NULL,
  PRIMARY KEY (`medicine_id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine`
--

INSERT INTO `medicine` (`medicine_id`, `classification`, `symptom`, `treatment`, `medicine`, `cat_id`, `lang_id`, `diagonisis`) VALUES
(1, '1', 'Semptom 1', 'treat ment 1', 'Medicine 1', 1, 1, 'Diagonisis '),
(2, '1', 'Semptom 2', 'treat ment 2', 'Medicine 2', 1, 1, 'Diagonisis 1'),
(3, '2', 'Semptom 3', 'treat ment 3', 'Medicine 3', 2, 2, 'Diagonisis 3'),
(4, '2', 'Semptom 4', 'treat ment 4', 'Medicine 4', 2, 2, 'Diagonisis 4'),
(5, '3', 'Headech', 'heat of body', 'Napa', 3, 2, 'take doctor suggestion'),
(6, '4', 'High fever', 'kamo therapy ', 'Napa', 7, 2, 'Lorem ipsum dolor sit amet.'),
(7, '5', 'Lorem ipsum dolor.', 'Lorem ipsum dolor sit.', 'Lorem ipsum.', 5, 2, 'Lorem ipsum dolor sit amet.'),
(8, '1', 'test', 'test', 'test', 1, 1, 'tesrt'),
(9, '2', 'test', 'test', 'napa', 2, 2, 'ss'),
(10, '3', 'zxc', 'zxc', 'zxc', 3, 2, 'zxc'),
(11, '9', '', '', 'test', 6, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `medicine_herbs`
--

CREATE TABLE IF NOT EXISTS `medicine_herbs` (
  `mh_id` int(11) NOT NULL AUTO_INCREMENT,
  `medicine_id` int(11) DEFAULT NULL,
  `herbs_id` int(11) DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`mh_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `medicine_herbs`
--

INSERT INTO `medicine_herbs` (`mh_id`, `medicine_id`, `herbs_id`, `lang_id`) VALUES
(1, 1, 1, 1),
(2, 2, 3, 1),
(3, 3, 2, 2),
(4, 3, 4, 2),
(5, 3, 5, 2),
(6, 3, 7, 2),
(7, 4, 0, 2),
(8, 4, 5, 2),
(9, 5, 8, 3),
(10, 5, 9, 3),
(11, 6, 8, 3),
(12, 6, 0, 3),
(13, 6, 13, 3),
(14, 6, 0, 3),
(15, 6, 0, 3),
(16, 6, 15, 3),
(17, 6, 16, 3),
(18, 6, 17, 3),
(19, 5, 4, 2),
(20, 3, 0, 2),
(21, 7, 0, 2),
(22, 3, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `medicine_temp`
--

CREATE TABLE IF NOT EXISTS `medicine_temp` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `patient_id` text DEFAULT NULL,
  `medicine_name` text DEFAULT NULL,
  `herbs` text DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_medical_info`
--

CREATE TABLE IF NOT EXISTS `patient_medical_info` (
  `pmi_id` int(11) NOT NULL AUTO_INCREMENT,
  `patient_id` text DEFAULT NULL,
  `dob` varchar(200) DEFAULT NULL,
  `food_allergies` text DEFAULT NULL,
  `bleed_tendency` text DEFAULT NULL,
  `heart_disease` text DEFAULT NULL,
  `diabetic` text DEFAULT NULL,
  `high_blood_pressure` text DEFAULT NULL,
  `surgeries` text DEFAULT NULL,
  `accidents` text DEFAULT NULL,
  `others` text DEFAULT NULL,
  `high_risk_diseases` text DEFAULT NULL,
  `family_history` text DEFAULT NULL,
  `current_medication` text DEFAULT NULL,
  `female_pregnent` text DEFAULT NULL,
  `female_breast_feeding` text DEFAULT NULL,
  `others_msurance` text DEFAULT NULL,
  `others_comcare` text DEFAULT NULL,
  `others_tac` text DEFAULT NULL,
  `others_low_income` text DEFAULT NULL,
  `others_reffer` text DEFAULT NULL,
  `subscription` text DEFAULT NULL,
  PRIMARY KEY (`pmi_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `patient_tbl`
--

CREATE TABLE IF NOT EXISTS `patient_tbl` (
  `patient_id` varchar(250) NOT NULL,
  `family_name` text NOT NULL,
  `given_name` text NOT NULL,
  `patient_email` varchar(120) DEFAULT NULL,
  `patient_phone` varchar(15) DEFAULT NULL,
  `mobile_number` varchar(222) DEFAULT NULL,
  `title` text DEFAULT NULL,
  `post_code` varchar(210) DEFAULT NULL,
  `suburb` text DEFAULT NULL,
  `address` text DEFAULT NULL,
  `sex` varchar(120) DEFAULT NULL,
  `birth_date` date NOT NULL,
  `blood_group` varchar(250) NOT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `emg_title` text DEFAULT NULL,
  `emg_family_name` text DEFAULT NULL,
  `emg_given_name` text DEFAULT NULL,
  `emg_phone` varchar(210) DEFAULT NULL,
  `emg_mobile` varchar(210) DEFAULT NULL,
  `create_by` int(11) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`patient_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `payment_account_setup`
--

CREATE TABLE IF NOT EXISTS `payment_account_setup` (
  `set_up_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `paypal_email` varchar(200) NOT NULL,
  `amount` double NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  PRIMARY KEY (`set_up_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `payment_account_setup`
--

INSERT INTO `payment_account_setup` (`set_up_id`, `doctor_id`, `paypal_email`, `amount`, `status`) VALUES
(1, 1, 'test@gmail.com', 25, 0);

-- --------------------------------------------------------

--
-- Table structure for table `payment_table`
--

CREATE TABLE IF NOT EXISTS `payment_table` (
  `payment_id` int(11) NOT NULL AUTO_INCREMENT,
  `appointment_id` varchar(200) NOT NULL,
  `patient_id` varchar(200) NOT NULL,
  `doctor_id` int(11) NOT NULL,
  `amount` double NOT NULL,
  `payer_email` varchar(200) NOT NULL,
  `date_time` datetime NOT NULL,
  `payment_status` int(11) NOT NULL DEFAULT 1,
  `notes` text DEFAULT NULL,
  PRIMARY KEY (`payment_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `prescription_data`
--

CREATE TABLE IF NOT EXISTS `prescription_data` (
  `prescription_id` int(11) NOT NULL AUTO_INCREMENT,
  `data` text DEFAULT NULL,
  `patient_id` text DEFAULT NULL,
  `doctor_id` int(11) DEFAULT NULL,
  `create_date_time` datetime DEFAULT NULL,
  `appointment_id` text DEFAULT NULL,
  PRIMARY KEY (`prescription_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pres_language`
--

CREATE TABLE IF NOT EXISTS `pres_language` (
  `lang_id` int(11) NOT NULL AUTO_INCREMENT,
  `lang_name` text NOT NULL,
  PRIMARY KEY (`lang_id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pres_language`
--

INSERT INTO `pres_language` (`lang_id`, `lang_name`) VALUES
(1, 'Bangla'),
(2, 'English'),
(3, 'Spanish'),
(4, 'Hindi');

-- --------------------------------------------------------

--
-- Table structure for table `print_pattern`
--

CREATE TABLE IF NOT EXISTS `print_pattern` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pattern_no` text NOT NULL,
  `header_height` int(11) DEFAULT NULL,
  `header_width` int(11) DEFAULT NULL,
  `footer_height` int(11) DEFAULT NULL,
  `footer_width` int(11) DEFAULT NULL,
  `content_height_1` int(11) DEFAULT NULL,
  `content_width_1` int(11) DEFAULT NULL,
  `content_height_2` int(11) DEFAULT NULL,
  `content_width_2` int(11) DEFAULT NULL,
  `pattern_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `print_pattern`
--

INSERT INTO `print_pattern` (`id`, `pattern_no`, `header_height`, `header_width`, `footer_height`, `footer_width`, `content_height_1`, `content_width_1`, `content_height_2`, `content_width_2`, `pattern_status`) VALUES
(1, 'pattern_two', 250, 800, 200, 800, 300, 800, 300, 800, 1);

-- --------------------------------------------------------

--
-- Table structure for table `schedul_setup_tbl`
--

CREATE TABLE IF NOT EXISTS `schedul_setup_tbl` (
  `schedul_id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `day` int(11) NOT NULL,
  `per_patient_time` int(11) NOT NULL,
  `visibility` int(11) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`schedul_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE IF NOT EXISTS `section` (
  `ms_id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` text DEFAULT NULL,
  `lang_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`ms_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`ms_id`, `section_name`, `lang_id`) VALUES
(1, 'Section One', 1),
(4, 'Section two', 2),
(5, 'Section Three', 2),
(8, 'new', 2),
(9, 'Not conform', 2);

-- --------------------------------------------------------

--
-- Table structure for table `service_info`
--

CREATE TABLE IF NOT EXISTS `service_info` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_name` text NOT NULL,
  `service_price` int(11) NOT NULL,
  `description` text DEFAULT NULL,
  `tax` int(11) DEFAULT NULL,
  `model` varchar(122) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `service_info`
--

INSERT INTO `service_info` (`id`, `service_name`, `service_price`, `description`, `tax`, `model`) VALUES
(1, 'Doctor Visit', 500, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 15, 'DV'),
(2, 'X-RAY', 1000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et.', 100, 'digital'),
(5, 'CT-Scan', 2000, 'Lorem ipsum.', 200, 'CS'),
(6, 'Blood Test ', 1500, 'Lorem ipsum dolor sit.', 150, 'BT'),
(7, 'Delivery ', 5000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et.', 1000, 'DV'),
(8, 'Covic-19 test', 4500, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam.', 450, 'C9'),
(9, 'Regular Check-up', 1000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et.', 150, 'RC'),
(10, 'Physio therapy  ', 3000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et fermentum dui. Ut orci quam, ornare sed lorem sed, hendrerit auctor dolor. Nulla viverra, nibh quis ultrices malesuada, ligula ipsum.', 300, 'PT'),
(11, 'Baby Vaccine ', 1500, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et.', 75, 'BV'),
(12, 'Dialysis ', 2000, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et.', 200, 'DL');

-- --------------------------------------------------------

--
-- Table structure for table `sms_delivery`
--

CREATE TABLE IF NOT EXISTS `sms_delivery` (
  `sms_delivery_id` int(11) NOT NULL AUTO_INCREMENT,
  `ss_id` int(11) NOT NULL,
  `delivery_date_time` datetime NOT NULL,
  `sms_info_id` int(11) NOT NULL,
  `message` text NOT NULL,
  PRIMARY KEY (`sms_delivery_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sms_gateway`
--

CREATE TABLE IF NOT EXISTS `sms_gateway` (
  `gateway_id` int(11) NOT NULL AUTO_INCREMENT,
  `provider_name` text NOT NULL,
  `user` varchar(150) NOT NULL,
  `password` varchar(150) NOT NULL,
  `authentication` text NOT NULL,
  `link` text NOT NULL,
  `default_status` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`gateway_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_gateway`
--

INSERT INTO `sms_gateway` (`gateway_id`, `provider_name`, `user`, `password`, `authentication`, `link`, `default_status`, `status`) VALUES
(1, 'nexmo', 'nexmo', 'sss', 'sss', 'https://www.nexmo.com/', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_info`
--

CREATE TABLE IF NOT EXISTS `sms_info` (
  `sms_info_id` int(11) NOT NULL AUTO_INCREMENT,
  `doctor_id` int(11) NOT NULL,
  `patient_id` varchar(100) NOT NULL,
  `phone_no` varchar(250) NOT NULL,
  `appointment_date` datetime NOT NULL,
  `appointment_id` varchar(250) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `sms_counter` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`sms_info_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sms_schedule`
--

CREATE TABLE IF NOT EXISTS `sms_schedule` (
  `ss_id` int(11) NOT NULL AUTO_INCREMENT,
  `ss_teamplate_id` int(11) NOT NULL,
  `ss_name` text NOT NULL,
  `ss_schedule` varchar(100) NOT NULL,
  `ss_status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`ss_id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_schedule`
--

INSERT INTO `sms_schedule` (`ss_id`, `ss_teamplate_id`, `ss_name`, `ss_schedule`, `ss_status`) VALUES
(1, 1, 'new ', '5:10:13', 1),
(2, 8, 'New offer', '10:13:16', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sms_teamplate`
--

CREATE TABLE IF NOT EXISTS `sms_teamplate` (
  `teamplate_id` int(11) NOT NULL AUTO_INCREMENT,
  `teamplate_name` text DEFAULT NULL,
  `teamplate` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `default_status` int(11) NOT NULL DEFAULT 0,
  PRIMARY KEY (`teamplate_id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sms_teamplate`
--

INSERT INTO `sms_teamplate` (`teamplate_id`, `teamplate_name`, `teamplate`, `status`, `default_status`) VALUES
(1, 'Appointment ', 'You appointment is conformed.', 1, 1),
(6, 'Prescription ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et.', 1, 0),
(7, 'Invoice', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et.', 1, 0),
(8, 'New package ', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam et.\r\n', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users_tbl`
--

CREATE TABLE IF NOT EXISTS `users_tbl` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `log_id` int(11) NOT NULL,
  `full_name` varchar(200) NOT NULL,
  `user_email` varchar(55) NOT NULL,
  `user_phone` varchar(15) DEFAULT NULL,
  `birth_date` varchar(55) DEFAULT NULL,
  `sex` varchar(55) DEFAULT NULL,
  `blood_group` varchar(12) DEFAULT NULL,
  `address` text DEFAULT NULL,
  `picture` varchar(100) DEFAULT NULL,
  `create_date` datetime NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `web_pages_tbl`
--

CREATE TABLE IF NOT EXISTS `web_pages_tbl` (
  `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` text DEFAULT NULL,
  `details` text DEFAULT NULL,
  `sequence` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `picture` varchar(250) DEFAULT NULL,
  `head_line` text DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=55 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `web_pages_tbl`
--

INSERT INTO `web_pages_tbl` (`id`, `name`, `details`, `sequence`, `date`, `icon`, `picture`, `head_line`, `status`) VALUES
(1, 'phone', '01751178212', NULL, NULL, NULL, NULL, NULL, 1),
(2, 'email', 'business@bdtask.com', NULL, NULL, NULL, NULL, NULL, 1),
(3, 'facebook', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(4, 'twitter', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(5, 'linkedin', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(6, 'youtube', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(7, 'google', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(8, 'hotline', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(9, 'working_des', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(10, 'logo', NULL, NULL, NULL, NULL, 'https://newclinic365.bdtask.com/new/./assets/uploads/images/2docto.png', NULL, 1),
(11, 'app_image', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(12, 'about_img', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(13, 'google_map', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(14, 'total_appointment_details', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(15, 'today_appointment_details', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(16, 'total_patient_details', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(17, 'address', ' Evar Green socity 98 Greenroad, Farmgat \r\nDhaka-1200, Bangladesh', NULL, NULL, NULL, NULL, NULL, 1),
(18, 'twitter_post', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(19, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(20, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(21, 'copy_right', 'Developed By BDtask .', NULL, NULL, NULL, NULL, NULL, 1),
(22, 'website_title', 'Clinic 365', NULL, NULL, NULL, NULL, NULL, 1),
(23, 'timezone', 'Asia/Dhaka', NULL, NULL, NULL, NULL, NULL, 1),
(24, 'youtube_chanel_id', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(25, 'website_on_off', 'on', NULL, NULL, NULL, NULL, NULL, 1),
(26, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(27, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(28, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(29, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(30, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(31, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(32, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(33, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(34, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(35, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(36, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(37, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(38, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(39, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(40, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(41, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(42, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(43, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(44, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(45, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(46, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(47, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(48, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(49, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(50, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(51, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(52, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(53, 'footer_picture', NULL, NULL, NULL, NULL, NULL, NULL, 1),
(54, 'fabicon', NULL, NULL, NULL, NULL, 'https://soft23.bdtask.com/clinic365-new/./assets/uploads/images/Doctor.png', NULL, 1);

-- --------------------------------------------------------

--
-- Structure for view `action_serial`
--
DROP TABLE IF EXISTS `action_serial`;

CREATE VIEW `action_serial`  AS  select `appointment_tbl`.`id` AS `id`,`appointment_tbl`.`appointment_id` AS `appointment_id`,`appointment_tbl`.`patient_id` AS `patient_id`,`appointment_tbl`.`phone_number` AS `phone_number`,`appointment_tbl`.`schedul_id` AS `schedul_id`,`appointment_tbl`.`date` AS `date`,`appointment_tbl`.`sequence` AS `sequence`,`appointment_tbl`.`doctor_id` AS `doctor_id`,`appointment_tbl`.`problem` AS `problem`,`appointment_tbl`.`get_date_time` AS `get_date_time`,`appointment_tbl`.`get_by` AS `get_by`,`appointment_tbl`.`status` AS `status`,`schedul_setup_tbl`.`day` AS `day`,`schedul_setup_tbl`.`start_time` AS `start_time`,`schedul_setup_tbl`.`end_time` AS `end_time`,`schedul_setup_tbl`.`per_patient_time` AS `per_patient_time`,`schedul_setup_tbl`.`visibility` AS `visibility` from (`appointment_tbl` join `schedul_setup_tbl`) where `appointment_tbl`.`schedul_id` = `schedul_setup_tbl`.`schedul_id` and `schedul_setup_tbl`.`status` = '1' ;
