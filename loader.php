<?php
/**
 * Plugin Name: Link shield
 * Plugin URI: http://wangdev.com/
 * Description: Replace the URL base of the communication media who are members of CEDRO and AEDE
 * Version: 0.6.0
 * Author: José Conti
 * Author URI: http://www.joseconti.com
 * License: GPL2 or later
 * Text Domain: link-shield
 * Domain Path: /languages
 *
 * @package Link Shield
 */

	$aede_domains = array(
		'abc.es',
		'abcdesevilla.es',
		'aede.es',
		'as.com',
		'canarias7.es',
		'cincodias.com',
		'deia.com',
		'diaridegirona.cat',
		'diaridetarragona.com',
		'diarideterrassa.es',
		'diariocordoba.com',
		'diariodeavila.es',
		'diariodeavisos.com',
		'diariodeburgos.es',
		'diariodecadiz.es',
		'diariodeibiza.es',
		'diariodejerez.es',
		'diariodelaltoaragon.es',
		'diariodeleon.es',
		'diariodemallorca.es',
		'diariodenavarra.es',
		'diariodesevilla.es',
		'diarioinformacion.com',
		'diariojaen.es',
		'diariopalentino.es',
		'diariovasco.com',
		'eladelantado.com',
		'elcomercio.es',
		'elcorreo.com',
		'elcorreoweb.es',
		'eldiadecordoba.es',
		'eldiariomontanes.es',
		'eleconomista.es',
		'elmundo.es',
		'elpais.com',
		'elpais.es',
		'elperiodico.com',
		'elperiodicodearagon.com',
		'elperiodicoextremadura.com',
		'elperiodicomediterraneo.com',
		'elprogreso.es',
		'elprogreso.galiciae.com',
		'europasur.es',
		'expansion.com',
		'farodevigo.es',
		'gaceta.es',
		'granadahoy.com',
		'heraldo.es',
		'heraldodesoria.es',
		'hoy.es',
		'huelvainformacion.es',
		'ideal.es',
		'intereconomia.com',
		'lagacetadesalamanca.es',
		'laopinion.es',
		'laopinioncoruna.es',
		'laopiniondemalaga.es',
		'laopiniondemurcia.es',
		'laopiniondezamora.es',
		'laprovincia.es',
		'larazon.es',
		'larioja.com',
		'lasprovincias.es',
		'latribunadeciudadreal.es',
		'latribunadetalavera.es',
		'latribunadetoledo.es',
		'lavanguardia.com',
		'laverdad.es',
		'lavozdealmeria.es',
		'lavozdegalicia.es',
		'lavozdigital.es',
		'levante-emv.com',
		'lne.es',
		'majorcadailybulletin.es',
		'majorcadailybulletin.com',
		'malagahoy.es',
		'marca.com',
		'mundodeportivo.com',
		'noticiasdealava.com',
		'noticiasdegipuzkoa.com',
		'regio7.cat',
		'sport.es',
		'superdeporte.es',
		'ultimahora.es',
		'www.abc.es',
		'www.abcdesevilla.es',
		'www.aede.es',
		'www.as.com',
		'www.canarias7.es',
		'www.cincodias.com',
		'www.deia.com',
		'www.diaridegirona.cat',
		'www.diaridetarragona.com',
		'www.diarideterrassa.es',
		'www.diariocordoba.com',
		'www.diariodeavila.es',
		'www.diariodeavisos.com',
		'www.diariodeburgos.es',
		'www.diariodecadiz.es',
		'www.diariodeibiza.es',
		'www.diariodejerez.es',
		'www.diariodelaltoaragon.es',
		'www.diariodeleon.es',
		'www.diariodemallorca.es',
		'www.diariodenavarra.es',
		'www.diariodesevilla.es',
		'www.diarioinformacion.com',
		'www.diariojaen.es',
		'www.diariopalentino.es',
		'www.diariovasco.com',
		'www.eladelantado.com',
		'www.elcomercio.es',
		'www.elcorreo.com',
		'www.elcorreoweb.es',
		'www.eldiadecordoba.es',
		'www.eldiariomontanes.es',
		'www.eleconomista.es',
		'www.elmundo.es',
		'www.elpais.com',
		'www.elpais.es',
		'www.elperiodico.com',
		'www.elperiodicodearagon.com',
		'www.elperiodicoextremadura.com',
		'www.elperiodicomediterraneo.com',
		'www.elprogreso.es',
		'www.elprogreso.galiciae.com',
		'www.europasur.es',
		'www.expansion.com',
		'www.farodevigo.es',
		'www.gaceta.es',
		'www.granadahoy.com',
		'www.heraldo.es',
		'www.heraldodesoria.es',
		'www.hoy.es',
		'www.huelvainformacion.es',
		'www.ideal.es',
		'www.intereconomia.com',
		'www.lagacetadesalamanca.es',
		'www.laopinion.es',
		'www.laopinioncoruna.es',
		'www.laopiniondemalaga.es',
		'www.laopiniondemurcia.es',
		'www.laopiniondezamora.es',
		'www.laprovincia.es',
		'www.larazon.es',
		'www.larioja.com',
		'www.lasprovincias.es',
		'www.latribunadeciudadreal.es',
		'www.latribunadetalavera.es',
		'www.latribunadetoledo.es',
		'www.lavanguardia.com',
		'www.laverdad.es',
		'www.lavozdealmeria.es',
		'www.lavozdegalicia.es',
		'www.lavozdigital.es',
		'www.levante-emv.com',
		'www.lne.es',
		'www.majorcadailybulletin.es',
		'www.majorcadailybulletin.com',
		'www.malagahoy.es',
		'www.marca.com',
		'www.mundodeportivo.com',
		'www.noticiasdealava.com',
		'www.noticiasdegipuzkoa.com',
		'www.regio7.cat',
		'www.sport.es',
		'www.superdeporte.es',
		'www.ultimahora.es',
	);

	/**
	 * Load the plugin text domain for translation.
	 */
	function link_shield_init() {
		if ( function_exists( 'load_plugin_textdomain' ) ) {
			$plugin_dir = basename( __DIR__ );
			load_plugin_textdomain( 'link-shield', false, $plugin_dir . '/languages/' );
		}
	}
	add_action( 'init', 'link_shield_init' );

	require_once 'link-shield.php';

	/**
	 * Load the plugin for BuddyPress.
	 */
	function link_shield_buddypress_init() {
		require __DIR__ . '/buddypress-link-shield.php';
	}
	add_action( 'bp_include', 'link_shield_buddypress_init' );

	if ( class_exists( 'bbPress' ) ) {
		require __DIR__ . '/bbpress-link-shield.php';
	}
