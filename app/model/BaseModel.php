<?php
/**
 * The base model based on the Dibi connection
 *
 * @author Pavel Ptacek
 * @property DibiConnection $database
 */
abstract class BaseModel extends Nette\Object {
    /** @var DibiConnection */
    private $database;

    /**
     * @param DibiConnection $connection
     */
    public function __construct(DibiConnection $connection) {
        $this->database = $connection;
    }

    /**
     * @return DibiConnection
     */
    public function getDatabase() {
        return $this->database;
    }
}