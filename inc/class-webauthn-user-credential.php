<?php

namespace WildWolf\WordPress\TwoFactorWebAuthn;

use WildWolf\WordPress\TwoFactorWebAuthn\Vendor\{
	MadWizard\WebAuthn\Credential\CredentialId,
	MadWizard\WebAuthn\Credential\UserCredentialInterface,
	MadWizard\WebAuthn\Credential\UserHandle,
	MadWizard\WebAuthn\Crypto\CoseKeyInterface,
};

class WebAuthn_User_Credential implements UserCredentialInterface {
	private CredentialId $credential_id;
	private CoseKeyInterface $public_key;
	private UserHandle $user_handle;
	private $transports;

	public function __construct( CredentialId $credential_id, CoseKeyInterface $public_key, UserHandle $user_handle, array $transports = [] ) {
		$this->credential_id = $credential_id;
		$this->public_key    = $public_key;
		$this->user_handle   = $user_handle;
		$this->transports    = $transports;
	}

	public function getCredentialId(): CredentialId {
		return $this->credential_id;
	}

	public function getPublicKey(): CoseKeyInterface {
		return $this->public_key;
	}

	public function getUserHandle(): UserHandle {
		return $this->user_handle;
	}

	public function getTransports(): array {
		return $this->transports;
	}
}
