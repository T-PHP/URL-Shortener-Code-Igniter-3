--
-- Structure de la table `url_ci_expander`
--

CREATE TABLE `url_ci_expander` (
  `id_url` int(11) NOT NULL,
  `short_url` varchar(255) NOT NULL,
  `long_url` varchar(255) NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Structure de la table `url_ci_shortener`
--

CREATE TABLE `url_ci_shortener` (
  `id_url` int(11) NOT NULL,
  `short_code` varchar(10) NOT NULL,
  `url` text NOT NULL,
  `created_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Index pour les tables exportées
--

--
-- Index pour la table `url_ci_expander`
--
ALTER TABLE `url_ci_expander`
  ADD PRIMARY KEY (`id_url`);

--
-- Index pour la table `url_ci_shortener`
--
ALTER TABLE `url_ci_shortener`
  ADD PRIMARY KEY (`id_url`);

--
-- AUTO_INCREMENT pour les tables exportées
--

--
-- AUTO_INCREMENT pour la table `url_ci_expander`
--
ALTER TABLE `url_ci_expander`
  MODIFY `id_url` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
--
-- AUTO_INCREMENT pour la table `url_ci_shortener`
--
ALTER TABLE `url_ci_shortener`
  MODIFY `id_url` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;
