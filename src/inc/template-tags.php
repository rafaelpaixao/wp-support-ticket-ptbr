<?php

/**
 * Returns ticket status
 *
 * @since 1.0.0
 * @param int    $post_id Post ID
 * @param string $type    'class' returns the classnames
 *
 * @return string Status
 */
function sts_get_the_status( $post_id = null, $type = 'normal' ) {

	if ( null === $post_id ) {
		$post_id = get_the_ID();
	}

	if ( ! $post_id ) {
		return '';
	}

	if ( 'class' === $type ) {
		return sts_translate_status( get_post_meta( $post_id, 'ticket-status', true ), 'class' );
	}
	return sts_translate_status( get_post_meta( $post_id, 'ticket-status', true ) );
}

/**
 * Echoes the status.
 *
 * @param null $post_id
 */
function sts_the_status( $post_id = null ) {

	if ( null === $post_id ) {
		$post_id = get_the_ID();
	}

	echo esc_html( sts_get_the_status( $post_id ) );
}

/**
 * Returns if a ticket has been read by an agent
 *
 * @since 1.0.0
 * @param int $post_id  Post ID
 *
 * @return string read/unread
 */
function sts_get_the_ticket_read( $post_id = null ) {

	if ( null === $post_id ) {
		$post_id = get_the_ID();
	}

	$read = get_post_meta( $post_id, 'ticket-read', true );
	if ( ! empty( $read ) ) {
		return 'read';
	}

	return 'unread';
}

/**
 * Echoes whether the ticket has been read by an agent.
 *
 * @param int $post_id
 */
function sts_the_ticket_read( $post_id = null ) {

	if ( null === $post_id ) {
		$post_id = get_the_ID();
	}

	echo esc_html( sts_get_the_ticket_read( $post_id ) );
}
