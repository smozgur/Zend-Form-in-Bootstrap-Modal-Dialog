<?php
namespace Application\Model\Customer;

use Zend\Stdlib\JsonSerializable;

/**
 * CustomerEntity
 *
 * Entity for Customer Object
 * @author Suat Ozgur <smozgur@gmail.com>
 * @version 1.0
 * @package
 * @copyright 2016 batcoder.com
 *
 */
class CustomerEntity implements JsonSerializable
{
	/**
	 * @var int $id
	 */
    protected $id;
    
    /**
     * @var string $email
     */
    protected $email;
    
    /**
     * @var string $firstname
     */
    protected $firstname;
    
    /**
     * @var string $lastname
     */
    protected $lastname;
        
	/**
	 * @return int
	 */
	public function getId()
	{
		return $this->id;
	}
	
	/**
	 * @param int
	 * @return self
	*/
	public function setId($id)
	{
		$this->id = $id;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getEmail()
	{
		return $this->email;
	}
	
	/**
	 * @param string $email
	 * @return self
	*/
	public function setEmail($email)
	{
		$this->email = $email;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getFirstName()
	{
		return $this->firstname;
	}
	
	/**
	 * @param string $firstname
	 * @return self
	*/
	public function setFirstName($firstname)
	{
		$this->firstname = $firstname;
		return $this;
	}
	
	/**
	 * @return string
	 */
	public function getLastName()
	{
		return $this->lastname;
	}
	
	/**
	 * @param string $lastname
	 * @return self
	*/
	public function setLastName($lastname)
	{
		$this->lastname = $lastname;
		return $this;
	}
	
    /**
     * @param array $data
     */
    public function exchangeArray($data)
    {
        // $this->id = (isset($data['id'])) ? $data['id'] : null;
        $this->email = (isset($data['email'])) ? $data['email'] : null;
        $this->firstname = (isset($data['firstname'])) ? $data['firstname'] : null;
        $this->lastname = (isset($data['lastname'])) ? $data['lastname'] : null;
    }
    
    /**
     * @return array
     */
    public function getArrayCopy()
    {
        return get_object_vars($this);
    }
    
    /**
     * {@inheritDoc}
     * @see JsonSerializable::jsonSerialize()
     */
    public function jsonSerialize()
    {
        return get_object_vars($this);
    }
}
