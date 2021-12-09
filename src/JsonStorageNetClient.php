<?php

namespace Addshore\JsonStorageNet;

class JsonStorageNetClient {

    private $apiKey;

    public function __construct( string $apiKey = null ) {
        $this->apiKey = $apiKey;
    }

    private function client() {
        return new \GuzzleHttp\Client([
            'base_uri' => 'https://api.jsonstorage.net/v1/json/'
        ]);
    }

    private function apiKeyPart() : string {
        return $this->apiKey ? '?apiKey=' . $this->apiKey : '';
    }

    /**
     * @param mixed $data data to store as JSON
     * @return string the ID of the data stored
     */
	public function create( $data ) : string {
        $request = $this->client()->request(
            'POST',
            $this->apiKeyPart(),
            [
                'body' => json_encode( $data ),
                'headers' => [ 'content-type' => 'application/json; charset=utf-8' ],
            ]
        );
        return str_replace( 'https://api.jsonstorage.net/v1/json/', '', json_decode( $request->getBody(), true )['uri'] );
	}

    /**
     * @param string $id to delete
     */
	public function delete( $id ) {
        $this->client()->request(
            'DELETE',
            $id . $this->apiKeyPart()
        );
	}

    /**
     * @param string $id to retrieve
     * @return mixed the data stored
     */
	public function get( string $id ) {
        $request = $this->client()->request(
            'GET',
            $id . $this->apiKeyPart(),
        );
        return json_decode( $request->getBody(), true );
	}

    /**
     * @param string $id to update
     * @param mixed $data to update
     */
	public function put( string $id, $data ) : void {
        $this->client()->request(
            'PUT',
            $id . $this->apiKeyPart(),
            [
                'body' => json_encode( $data ),
                'headers' => [ 'content-type' => 'application/json; charset=utf-8' ],
            ]
        );
	}

}