<?php
namespace Aelion\Http\Request;

final class Request {
    private array $request = [];

    public function __construct() {
        $this->_hydrate();
    }

    /**
     * @param string $item : item to store
     * @param mixed $value : value associated
     */
    public function addRequestData (string $item, $value): void {
        $this->request[$item] = $value;
    }

    public function __set(string $property, $value): void {
        if (!property_exists($this, $property)) {
            $this->request[$property] = $value;
        }
    }

    public function __get(string $property) {
        if (!property_exists($this, $property)) {
            if (array_key_exists($property, $this->request)) {
                return $this->request[$property];
            }
        }
        return null;
    }

    public function getRequestData(string $key, $value = null) {
        if (array_key_exists($key, $this->request)) {
            return $this->request[$key];
        }

        if ($value !== null) {
            $this->addRequestData($key, $value);
            return $value;
        }

        throw new \Exception('No item named ' . $key . ' in request datas');
    }

    private function _hydrate(): void {
        foreach($_SERVER as $key => $value) {
            $this->{strtolower($key)} = $value;
        }
    }
}