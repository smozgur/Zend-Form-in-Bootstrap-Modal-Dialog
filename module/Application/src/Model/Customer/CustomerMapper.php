<?php
namespace Application\Model\Customer;
 
/**
 * CustomerMapper
 * 
 * Mapper for Customer Model
 * @author Suat Ozgur <smozgur@gmail.com>
 * @version 1.0
 * @package
 * @copyright 2016 batcoder.com
 *
 */
class CustomerMapper
{
    
    /**
     * 
     * @var array $data
     */
    protected $data;
    
    /**
     * Constructor
     * @param TableGateway $tableGateway
     */
    public function __construct()
    {
        $sample =[ 
            ['id' => 1, 'firstname' => 'Rod', 'lastname' => 'Stewart', 'email' => 'rod@batcoder.com'],
            ['id' => 2, 'firstname' => 'Sam', 'lastname' => 'Cooke', 'email' => 'sam@batcoder.com'],
            ['id' => 3, 'firstname' => 'Otis', 'lastname' => 'Redding', 'email' => 'otis@batcoder.com'],
            ['id' => 4, 'firstname' => 'Muddy', 'lastname' => 'Waters', 'email' => 'muddy@batcoder.com'],
        ];
        
        foreach ($sample as $item) {
            $customer = new CustomerEntity();
            $customer->setId($item['id'])
                ->setFirstName($item['firstname'])
                ->setLastName($item['lastname'])
                ->setEmail($item['email']);
            $this->data[$item['id']] = $customer;
        }
    }
    
    public function fetch($id) 
    {
        
        if (!array_key_exists($id, $this->data)) {
            return null;
        }

        return $this->data[$id];
    }
 
}
