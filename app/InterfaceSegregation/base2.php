<?php

interface Employable
{
    public function takeLunchBreak();
}
interface Networkable
{
    public function fixNetworkIssue();
}

interface Fixable
{
    public function fixBugs();
}

interface Answerable
{
    public function answerCalls();
}

class CustomerServiceAgent implements Employable, Answerable
{


    public function takeLunchBreak()
    {
        // TODO: Implement takeLunchBreak() method.
    }

    public function answerCalls()
    {
        // TODO: Implement answerCalls() method.
    }
}

class Developer implements Employable,Fixable
{

    public function takeLunchBreak(){}
    public function fixBugs(){}
}

class NetworkEngineer implements Employable,Networkable
{
    public function takeLunchBreak(){}
    public function fixNetworkIssue(){}
}

