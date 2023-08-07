<?php
declare(strict_types=1);

namespace App\Policy;

use App\Model\Entity\Car;
use Authorization\IdentityInterface;

/**
 * Car policy
 */
class CarPolicy
{
    /**
     * Check if $user can add Car
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Car $car
     * @return bool
     */
    public function canAdd(IdentityInterface $user, Car $car)
    {
        return true;
    }

    /**
     * Check if $user can edit Car
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Car $car
     * @return bool
     */
    public function canEdit(IdentityInterface $user, Car $car)
    {
        return $this->isAuthor($user, $car);
    }

    /**
     * Check if $user can delete Car
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Car $car
     * @return bool
     */
    public function canDelete(IdentityInterface $user, Car $car)
    {
        return $this->isAuthor($user, $car);
    }

    /**
     * Check if $user can view Car
     *
     * @param \Authorization\IdentityInterface $user The user.
     * @param \App\Model\Entity\Car $car
     * @return bool
     */
    public function canView(IdentityInterface $user, Car $car)
    {
    }

    protected function isAuthor(IdentityInterface $user, Car $car)
    {
        return $car->user_id === $user->getIdentifier();
    }
}
