<?php
class Comment
{
    private $user;
    private $blog;
    private $comment;
    private $approved;
    private $created;
    private $updated;

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of blog
     */
    public function getBlog()
    {
        return $this->blog;
    }

    /**
     * Set the value of blog
     *
     * @return  self
     */
    public function setBlog($blog)
    {
        $this->blog = $blog;

        return $this;
    }

    /**
     * Get the value of comment
     */
    public function getComment()
    {
        return $this->comment;
    }

    /**
     * Set the value of comment
     *
     * @return  self
     */
    public function setComment($comment)
    {
        $this->comment = $comment;

        return $this;
    }



    /**
     * Get the value of created
     */
    public function getCreated()
    {
        /* $this->created = DateTime::createFromFormat('F d, Y', 'Apr 30, 2010');
        return $this->created->format('Y-m-d'); */
        //return  $this->created = $dateTime->format('Y-m-d H:i:s');
        /*  return $this->created; */
        return $this->created;
    }

    /**
     * Set the value of created
     *
     * @return  self
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * Get the value of updated
     */
    public function getUpdated()
    {
        return $this->updated;
    }

    /**
     * Set the value of updated
     *
     * @return  self
     */
    public function setUpdated($updated)
    {
        $this->updated = $updated;
    }

    /**
     * Get the value of approved
     */
    public function getApproved()
    {
        return $this->approved;
    }

    /**
     * Set the value of approved
     *
     * @return  self
     */
    public function setApproved($approved)
    {
        $this->approved = $approved;

        return $this;
    }
}
