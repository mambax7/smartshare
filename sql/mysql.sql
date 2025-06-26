CREATE TABLE smartshare_counts (
  id INT AUTO_INCREMENT PRIMARY KEY,
  platform VARCHAR(50) NOT NULL,
  url TEXT NOT NULL,
  count INT DEFAULT 0,
  UNIQUE KEY uniq_platform_url (platform(20), url(190))
);
