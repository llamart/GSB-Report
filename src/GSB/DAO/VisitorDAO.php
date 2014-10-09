<?php

namespace GSB\DAO;


use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\Exception\UnsupportedUserException;
use GSB\Domain\Visitor;

class VisitorDAO extends DAO implements UserProviderInterface
{
      
    /**
     * Returns a user matching the supplied id.
     *
     * @param integer $id
     *
     * @return \MicroCMS\Domain\User|throws an exception if no matching user is found
     */
    public function find($id) {
        $sql = "select * from visitor wher visitor_id=?";
        $row = $this->getDb()->fetchAssoc($sql, array($id));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new \Exception("No visitor matching id " . $id);
    }

    /**
     * {@inheritDoc}
     */
    public function loadUserByUsername($username)
    {
        $sql = "select * from visitor where user_name=?";
        $row = $this->getDb()->fetchAssoc($sql, array($username));

        if ($row)
            return $this->buildDomainObject($row);
        else
            throw new UsernameNotFoundException(sprintf('User "%s" not found.', $username));
    }

    /**
     * {@inheritDoc}
     */
    public function refreshUser(UserInterface $visitor)
    {
        $class = get_class($visitor);
        if (!$this->supportsClass($class)) {
            throw new UnsupportedUserException(sprintf('Instances of "%s" are not supported.', $class));
        }
        return $this->loadUserByUsername($visitor->getUsername());
    }

    /**
     * {@inheritDoc}
     */
    public function supportsClass($class)
    {
        return 'GSB\Domain\User' === $class;
    }

    /**
     * Creates a User object based on a DB row.
     *
     * @param array $row The DB row containing User data.
     * @return \MicroCMS\Domain\User
     */
    protected function buildDomainObject($row) {
        $user = new Visitor();
        $user->setAddress($row['visitor_address']);
        $user->setCity($row['visitor_city']);
        $user->setFirstname($row['visitor_last_name']);
        $user->setHiringDate($row['hiring_date']);
        $user->setId($row['visitor_id']);
        $user->setLaboratory($row['laboratory_id']);
        $user->setLastName($row['visitor_last_name']);
        $user->setPasword($row['password']);
        $user->setRole($row['role']);
        $user->setSalt($row ['salt']);
        $user->setSector($row['sector_id']);
        $user->setUserName($row['user_name']);
        $user->setVisitorType($row['visitor_type']);
        $user->setZipCode($row['visitor_zip_code']);
        return $user;
    }
}