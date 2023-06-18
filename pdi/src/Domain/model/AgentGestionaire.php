<?php

namespace Domain\model;

class AgentGestionaire extends Utilisateur
{

    public function getUserType(): string
    {
        return "AGENT_GESTION";
    }
}